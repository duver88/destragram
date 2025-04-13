<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use PhpParser\Node\Expr\FuncCall;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ModificarPerfil extends Controller



{
    public function index(){
       return view('perfil.index');
    }

    public function store(Request $request){
        $request->validate([
            'username' => ['required', 'max:30', 'unique:users']
        ]);

        if($request->imagen){
            $manager = new ImageManager(new Driver());
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            $imagenServidor = $manager->read($imagen);
            $imagenServidor->scale(1000, 1000);
           // $imagenServidor->resize(height: 1000x);
            $imagenesPath = public_path('profile') . '/' . $nombreImagen;
            $imagenServidor->save($imagenesPath);
            
        }

        //Guardar Info 
        $userGuardar = User::find(auth()->user()->id);
        
        $userGuardar->username = $request->username;
        $userGuardar->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
        $userGuardar->save();

        //Redirect

        return redirect()->route('post.index', $userGuardar->username);

    }


}
