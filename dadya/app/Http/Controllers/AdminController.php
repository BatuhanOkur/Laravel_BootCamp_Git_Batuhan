<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Refund;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminView(){
        $users = User::where('deleted_at',null)->get();
        $refunds = Refund::where('is_solved',false)->get();
        $data = [$users,$refunds];
        return view('layouts.panel',compact('data'));
    }

    public function getUsers(){
        return User::all();
    }
    public function getBooks($content){
        /*
        if($content == "Tarih"){
            return Book::with(['user'])->where('type','=','Tarih');
        }
        elseif($content == "Roman"){
            return Book::with(['user'])->where('type','=','Roman');
        }
        elseif($content == "Karikatür"){
            return Book::with(['user'])->where('type','=','Karikatür');
        }
        elseif($content == null){
            return Book::with(['user']);
        }
        */
        if(isset($content)){
            return Book::where('type',strval($content));
        }
        else{
            return Book::all();
        }

    }

}
