<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ModificarPerfil extends Controller



{
    public function index(){
       return view('perfil.index');
    }
}
