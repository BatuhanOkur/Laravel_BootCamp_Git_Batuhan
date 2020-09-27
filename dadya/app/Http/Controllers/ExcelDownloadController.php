<?php

namespace App\Http\Controllers;

use App\Exports\BookExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelDownloadController extends Controller
{
    public function bookExport(){
        return Excel::download(new BookExport,'books.xlsx');
    }
}
