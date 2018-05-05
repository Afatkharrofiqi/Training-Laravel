<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /**
     * fillable digunakan untuk mempercepat dalam penulisan di controller
     */
    protected $fillable = ['title','description'];
    /**
     * guard digunakan untuk mengecualikan inputan agar tidak ikut tersubmit di controller
     */
    protected $guard = [];

    function getTitleAttribute($value){
        return strtoupper($value);
    }

    function category(){
        return $this->belongsTo('App\Category');
    }
}
