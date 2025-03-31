<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Middleware\validar;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Auth\Middleware\Authenticate;

class PostController extends Controller
{

    public function index(User $user){

        $posts = Post::Where('user_id', $user->id)->paginate(20);

       // dd($user->username);
       return view('layauts.dashboard', [
           'user' => $user,
           'posts' => $posts
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

    //    Post::create([
    //     'titulo' => $recuest->titulo,
    //     'descripcion' => $recuest->descripcion,
    //     'imagen' => $recuest->imagen,
    //     'user_id' => auth()->user()->id
    // ]);

    $recuest->user()->posts()->create([
        'titulo' => $recuest->titulo,
        'descripcion' => $recuest->descripcion,
        'imagen' => $recuest->imagen,
        'user_id' => auth()->user()->id
    ]);

        return redirect()->route('post.index', auth()->user()->username);
    }

    public function show(User $user, post $post){
        return view('post.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function destroy(Post $post){
      $post->delete();
      return redirect()->route('post.index', auth()->user()->username);
    }
}
