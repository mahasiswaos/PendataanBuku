<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Penerbit extends Eloquent {
    
    protected $table = 'penerbit';
    public $timestamps = false;
    
    public function buku() {
        return $this->hasMany('App\\Models\\Buku'); 
    }
   
       
}