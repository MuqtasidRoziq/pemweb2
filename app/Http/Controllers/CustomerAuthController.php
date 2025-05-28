<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    
    public function login() 
    { 
        return view('web.customer.login',[ 
            'title'=>'Login' 
        ]); 
    } 
 
    public function register() 
    { 
        return view('web.customer.register',[ 
            'title'=>'Register' 
        ]); 
    } 
}
