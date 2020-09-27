<?php

namespace App\Exports;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::with(['user'])->where('is_approved',1)->get();
    }
}
