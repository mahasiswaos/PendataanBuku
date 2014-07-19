<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Input;
use Validator;
use Auth;
use Redirect;
use Session;
use App\Models\Users;
use Illuminate\Support\Facades\Crypt;
use View;
use App\Models\Penerbit;


class LoginController extends BaseController {

    public function index() {
        return View::make('login.index');
//        $data = 'admin';
//        echo Crypt::encrypt($data);
        
    }

    public function ProsesLogin() {
        
        
       $inp = Input::all(); 
       $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $valid = Validator::make($inp, $rules);
        if ($valid->fails()) {
            return Redirect::to('/login')->withErrors($valid);
        } else {
            $pass = $inp['password'];
            $email = $inp['email'];
            $data = [
                'email' => $email,
                'password' => $pass,
            ];
            if (Auth::attempt($data)) {
                Session::flash('message', 'Successfully Login!');
                return Redirect::intended('/buku');
            } else {
                Session::flash('message', 'Wrong Username and or Password!!!');
                return Redirect::to('/login');
            }
        }
    }
    
    public function doLogout() {
        Auth::Logout();
        return Redirect::to('login');
    }

}
