<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'products','user_id','count','total','address','city','is_delivered'
    ];

    protected $casts = [
        'products' => 'array'
    ];

    public function user(){
        return $this->hasMany('App\Models\User','id','user_id');
    }
}
