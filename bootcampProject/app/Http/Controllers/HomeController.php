<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function merhaba(){
        //$users = DB::table('users')->get(); //Veritabanından kullanıcıları çeker.
        $users = User::all(); //Model kullanarak kullanıcıları çeker.
        //dd($users);
        return view('merhaba', compact('users'));//->with(['users' => $users]); //merhaba isimli view dosyasına kullanıcılar yollandı.
    }
    public function kayit(){
        return view('users/create');
    }
    public function merhabaliste(){
        $users = User::all();
        return view('users/index',compact('users'));
    }
}
