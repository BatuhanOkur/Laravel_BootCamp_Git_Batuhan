<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','book_id','details','is_approved','is_solved','created_by','updated_by','deleted_by'
    ];

    public function user(){
        return $this->hasMany('App\Models\User','id','created_by');
    }
    public function book(){
        return $this->hasMany('App\Models\Book','id','book_id');
    }

}
