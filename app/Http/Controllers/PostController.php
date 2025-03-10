<?php

namespace App\Http\Controllers;

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
}
