<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ModificarPerfil extends Controller



{
    public function index(){
       return view('perfil.index');
    }

    public function store(Request $request,User $user ){
        $request->validate([
            'username' => [ 'max:30', 'unique:users,username,' .auth()->user()->id],
            'email' => ['unique:users,username,' .auth()->user()->id,'email' ],
            
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


        //Validar contraseña
            if (Auth::attempt( ['email' => auth()->user()->email, 'password' => $request->password], $request->remember)) {      
            $userGuardarPss = $request->passwordnew;
            $userGuardar = User::find(auth()->user()->id);
            //Guardar Info 
            $userGuardar->username = $request->username ?? auth()->user()->username;
            $userGuardar->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
            $userGuardar->password = $userGuardarPss ?? auth()->user()->password;
            $userGuardar->email = $request->email ?? auth()->user()->email ?? '';
            $userGuardar->save();
            
        } else{
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }
        
        //Redirect

        return redirect()->route('post.index', $userGuardar->username);

        

    }


}
