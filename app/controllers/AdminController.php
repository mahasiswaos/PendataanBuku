<?php

namespace App\Controllers;
use App\Controllers\BaseController;


class AdminController  extends BaseController{
    
    function __construct(){
        $this->beforeFilter('auth', ['except'=>'/login']);
    }
}
