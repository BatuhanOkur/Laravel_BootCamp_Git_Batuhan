<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main(){
        $books = Book::all();
        return view('main',compact('books'));
    }
}
