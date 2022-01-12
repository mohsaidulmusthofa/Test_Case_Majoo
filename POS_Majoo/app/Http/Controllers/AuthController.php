<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function index(){
        //Tampilan Login Admin
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request){
        
        $credentials = $request->validate([
            'email'     =>  'required|email:dns',
            'password'  =>  'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors('error');
    }
}
