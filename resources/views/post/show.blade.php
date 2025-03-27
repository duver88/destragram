@extends('layauts.app')

@section('titulo')
 {{$post->titulo }} 
@endsection

@section('contenido')

<div  class="container mx-auto md:flex">
    <div class="md: w-1/2 items-center rounded-3xl">
        <img src="{{ asset('uploads') . '/' . $post->imagen  }}" alt=" {{ $post->titulo }}">
        <div class="p-3">
            0 Likes 
        </div>
        <div>
            <p class="font-bold">{{ $post->user->username}}</p>
            <p class="text-sm text-gray-500"> {{ $post->created_at->diffForHumans()}}</p>
            <p class="mt-5">{{ $post->descripcion}}</p>
        </div>
    </div>

    <div class="md: w-1/2  p-5">
        <div class="shadow bg-white p-5 mb-5 rounded-2xl">
            @if(session('mensaje'))
                <div class="bg-green-500 p-2 rounded-lg mb-6 text-white uppercase font-bold text-center">
                        {{session('mensaje')}}       
                </div>
            @endif
            <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario </p>
            <form action="{{ route('comentarios.store', ['user' => $user, 'post' => $post])}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold ">Añade un comentario </label>
                    <textarea 
                    id="comentario"
                    name="comentario"
                    placeholder="Tu comentario "
                    class="border p-3 w-full rounded-md @error('comentario') border-red-600 @enderror"
                    ></textarea>
                    @error('comentario')
                    <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                    @enderror
                </div>

                <input 
                type="submit"
                value="Comentario "
                class="bg-sky-600 hover:bg-sky-700 transition-colors duration-200 w-full text-white p-3 rounded-md"
                >
            </form>
        </div>
    </div>
</div>

@endsection