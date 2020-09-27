<?php

namespace App\Imports;

use App\Models\Book;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class BookImport implements ToModel
{
    public function model(array $row){
        return new Book([
            'name' => $row[0],
            'author' => $row[1],
            'type' => $row[2],
            'number' => $row[3],
            'price' => $row[4],
            'is_approved' => $row[5],
            'created_by' => $row[6],
        ]);
    }
}
