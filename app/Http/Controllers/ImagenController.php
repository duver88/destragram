<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ImagenController extends Controller
{
   public function store(){
    return 'Desde el controlador de Imagen';
   }
}
