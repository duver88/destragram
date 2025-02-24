<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use ReflectionFunctionAbstract;

class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request) 
    {
        // dd($request);
        // dd($request->all());

        //validacion 
        $request->validate([
            'name' => 'required|min:5|max:10',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
      
        ]);

        dd('Cuenta creada');
    }
    
}