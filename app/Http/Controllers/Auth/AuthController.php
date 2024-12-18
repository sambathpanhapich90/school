<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        if(!empty(Auth::check()))
        {
            return redirect()->route('home');
        };
       
        return view('Auth.login');
    }
    public function login(Request $request){
        // $validation = $request->validate([
        //     'email' => ['required|email'],
        //     'password' => ['required']
        // ]);
if(Auth::attempt([ 'email' => $request->email, 'password' => $request->password])){
    if(Auth::user()->role == 1){
     return redirect()->route('home');
    }else if(Auth::user()->role == 2){
                return redirect()->route('teacher');
    }
   
}else{
    return back()->withErrors( 'Invalid email and password' );
}
      
    
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
