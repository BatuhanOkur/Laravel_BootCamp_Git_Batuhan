<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function userCreateView(){
        return view('users.create');
    }
    public function userCreate(Request $request){
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'admin' => 'required|boolean'
        ]);
        $password = $request->get('password');
        User::create([
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'password' => Hash::make($password),
            'admin' => $request->get('admin')
        ]);
        return redirect()->route('user.index')->with('message','Kullanıcı başarıyla oluşturuldu!');
    }

    public function userIndex(){
        $users = User::where('deleted_at',null)->get();
        return view('users.index',compact('users'));
    }

    public function userDelete($id){
        $user = User::where('id',$id)->get();
        $user = $user->first();
        DB::table('users')->where('id','=',$id)->update([
            'deleted_at' => Carbon::now()
        ]);

        return redirect()->back()->with('message', 'Kullanıcı başarıyla silindi!');
    }

    public function userUpdateView($id){
        $user = User::where('id',$id)->get();
        $user = $user->first();

        return view('users.update',compact('user'));
    }

    public function userUpdate($id,Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'admin' => 'required|boolean'
        ]);
        $password = $request->get('password');
        User::where('id',$id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($password),
            'admin' => $request->get('admin')
        ]);
        return redirect()->route('user.index')->with('message',$id." ID'li kullanıcı başarıyla güncellendi!");
    }

    public function userCardView($id){
        $user = User::where('id',$id)->get();
        $user = $user->first();
        return view('users.profile-card',compact('user'));

    }

    public function userTempBanView($id){
        $user = User::where('id',$id)->get();
        $user = $user->first();
        return view('users.temp-ban',compact('user'));
    }

    public function userTempBan($id,Request $request){
        $user = User::where('id',$id)->get();
        $user = $user->first();
        $name = $user->name;
        $date = Carbon::parse($request->get('date'));
        $day = Carbon::now('d');
        User::where('id',$id)->update([
            'banned_until' => $date
        ]);
        return redirect()->route('user.profile-card',['id' => $id])->with('message',$name." isimli kullanıcı süreli yasaklandı.");
    }

    public function setAdmin($id){
        User::where('id',$id)->update([
            'admin' => true
        ]);
        $user = User::where('id',$id)->get();
        $user = $user->first();
        $name = $user->name;
        return redirect()->route('user.profile-card',['id' => $id])->with('message',$name." isimli kullanıcıyı admin yaptın.");
    }

    public function removeAdmin($id){

        if($id == auth()->user()->id){
            return redirect()->route('user.profile-card',['id' => $id])->with('error','Kendi yetkini alamazsın.');
        }
        else{
            User::where('id',$id)->update([
                'admin' => false
            ]);
            $user = User::where('id',$id)->get();
            $user = $user->first();
            $name = $user->name;
            return redirect()->route('user.profile-card',['id' => $id])->with('message',$name." isimli kullanıcının admin yetkisini aldın.");
        }
    }


}
