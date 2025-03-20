<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class PostController extends Controller
{
    public function index(User $user){

       // dd($user->username);
       return view('layauts.dashboard', [
           'user' => $user
       ]);
    }

    public function create(request $recuest){
        return view('post.create');
    }

    public function store (Request $recuest)
    {
       $recuest->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
       ]);

       Post::create([
        'titulo' => $recuest->titulo,
        'descripcion' => $recuest->descripcion,
        'imagen' => $recuest->imagen,
        'user_id' => auth()->user()->id
    ]);

        return redirect()->route('post.index', auth()->user()->username);
    }
}
