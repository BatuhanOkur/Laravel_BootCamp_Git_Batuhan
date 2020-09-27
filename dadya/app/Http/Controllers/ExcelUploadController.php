<?php

namespace App\Http\Controllers;

use App\Imports\BookImport;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelUploadController extends Controller
{
    public function userImportView(){
        return view('users.upload');
    }

    public function userImport(){
        Excel::import(new UserImport, \request()->file('file'));

        return back();
    }

    public function bookImportView(){
        return view('books.upload');
    }

    public function bookImport(){
        Excel::import(new BookImport, \request()->file('file'));

        return back();
    }
}
