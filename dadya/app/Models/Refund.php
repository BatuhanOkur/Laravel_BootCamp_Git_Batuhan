<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','order_id','details','is_approved','is_solved','created_by','updated_by','deleted_by'
    ];

    public function user(){
        return $this->hasMany('App\Models\User','id','created_by');
    }
    public function order(){
        return $this->hasMany('App\Models\Order','id','order_id');
    }

}
