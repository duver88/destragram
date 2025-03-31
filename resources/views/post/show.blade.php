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
        @auth
            @if($post->user_id === auth()->user()->id)
        <form action="{{ route('posts.destroy', $post)}}" method="POST">
            @method('DELETE')
            @csrf
            <input 
            type="submit"
            value="Eliminar"
            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
            >
        </form>
            @endif
        @endauth
    </div>

        
   
    <div class="md: w-1/2  ml-5">
        @auth
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
            @endauth
            <div class="bg-white shadow max-h-96 overflow-scroll  rounded-2xl">
                
                @if($post->comentarios->count())
                    @foreach ($post->comentarios as $comentario)
                        <div
                            class="flex-col w-full py-4 mx-auto mt-3 bg-white border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm md:w-3/3">
                            <div class="flex flex-row md-10">
                                <img class="w-12 h-12 border-2 border-gray-300 rounded-full" alt="Anonymous's avatar"
                                    src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&faces=1&faceindex=1&facepad=2.5&w=500&h=500&q=80">
                                <div class="flex-col mt-1">
                                    <div class="flex items-center flex-1 px-4 font-bold leading-tight">
                                    <a href="{{ route('post.index',$comentario->nombreDelComentario->username )}}">{{$comentario->nombreDelComentario->username}}</a>    
                                    
                                        <span class="ml-2 text-xs font-normal text-gray-500">{{ $comentario->created_at->diffForHumans()}}</span>
                                    </div>
                                    <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">{{ $comentario->comentario}}
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
            
                
                
                       
                    @endforeach
                    
                @else
                    <p>No hay comentarios</p>
                @endif
            </div>
        
        </div>
        
    </div>



   
</div>
@endsection