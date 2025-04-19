<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('layauts.login');
    }

    public function store(Request $request){
       
        $request->validate([
            
            'email' => 'required|email',
            'password' => 'required'
      
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('mensaje', 'Credenciales Incorrectass');
        }
        
        return redirect()->route('post.index', Auth::user());
    }

}
