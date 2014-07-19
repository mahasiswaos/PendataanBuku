<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Penulis extends Eloquent{
    
    protected $table = 'penulis';
    public $timestamps = false;
    
    public function buku() {
        return $this->hasMany('App\\Models\\Buku');
        
    }
    
}