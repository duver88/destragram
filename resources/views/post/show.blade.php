@extends('layauts.app')

@section('titulo')
 {{$post->titulo }} 
@endsection

@section('contenido')

<div  class="container mx-auto flex">
    <div class="md: w-1/2 items-center rounded-3xl">
        <img src="{{ asset('uploads') . '/' . $post->imagen  }}" alt=" {{ $post->titulo }}">
        <div>
            0 Likes 
        </div>
    </div>

    <div class="md: w-1/2 items-center flex">
        
    </div>
</div>

@endsection