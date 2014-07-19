<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Buku extends Eloquent {
   
    protected $table = 'buku';
    public $timestamps = false;
    
    function penerbit(){
        return $this->belongsTo('App\\Models\\Penerbit');
    }
    
    function penulis(){
        return $this->belongsTo('App\\Models\\Penulis');
    
    
}
}
