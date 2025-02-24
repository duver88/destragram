<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use ReflectionFunctionAbstract;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Hash;

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
        //Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

    
        //validacion 
        $request->validate([
            'name' => 'required|min:5|max:10',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
      
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

       return redirect()->route('post.index');
    }
    
}