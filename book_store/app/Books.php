<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'name','author','type','number','price','created_by','updated_by','deleted_by'
    ];

    public function employee(){
        return $this->hasMany('App\Employees','id','created_by');
    }
}
