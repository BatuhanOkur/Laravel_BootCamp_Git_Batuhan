<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    public function model(array $row){
        $password = $row[2];
        return new User([
            'name'=>$row[0],
            'email'=>$row[1],
            'password'=>Hash::make($password)
        ]);
    }
}
