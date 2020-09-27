<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo','name','author','type','number','price','is_approved','created_by','updated_by','deleted_by'
    ];

    public function user(){
        return $this->hasMany('App\Models\User','id','created_by');
    }
}
