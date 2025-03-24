<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use PhpParser\Node\Expr\FuncCall;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImagenController extends Controller
{
   public function store(Request $request){

    $manager = new ImageManager(new Driver());
    $imagen = $request->file('file');
    $nombreImagen = Str::uuid() . "." . $imagen->extension();
    $imagenServidor = $manager->read($imagen);
    $imagenServidor->scale(1000, 1000);
   // $imagenServidor->resize(height: 1000x);
    $imagenesPath = public_path('uploads') . '/' . $nombreImagen;
    $imagenServidor->save($imagenesPath);

    return response()->json(['imagen' => $nombreImagen]);

   }
}
