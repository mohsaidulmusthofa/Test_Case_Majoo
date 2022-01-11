<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function index(){
        //Tampilan Login Admin
        return view('login');
    }

    public function login(){
        
    }
}
