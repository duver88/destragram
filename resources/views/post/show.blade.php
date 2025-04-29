@extends('layauts.app')

@section('titulo')
    {{$post->titulo }} 
@endsection

@section('contenido')

<div class="container mx-auto md:flex py-8">
    <!-- Imagen y detalles del post -->
    <div class="md:w-1/2 rounded-3xl bg-white shadow-lg">
        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen de {{ $post->titulo }}" class="w-full h-96 object-cover rounded-t-3xl">

        @auth
        <div class="py-4 px-6">
            <livewire:like-post :post="$post" />
            <div class="pt-4 flex items-center gap-2"></div>
        </div>
        @endauth 
        
        <div class="px-6 py-4">
            <p class="font-semibold text-lg">{{ $post->user->username}}</p>
            <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans()}}</p>
            <p class="mt-5 text-gray-700">{{ $post->descripcion}}</p>
        </div>

        @auth
            @if($post->user_id === auth()->user()->id)
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="px-6 py-4">
                @method('DELETE')
                @csrf
                <input 
                    type="submit"
                    value="Eliminar"
                    class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-semibold mt-4 cursor-pointer w-full"
                >
            </form>
            @endif
        @endauth
    </div>

    <!-- Sección de comentarios -->
    <div class="md:w-1/2 ml-5">
        @auth
        <div class="shadow-lg bg-white p-6 mb-6 rounded-2xl">
            @if(session('mensaje'))
                <div class="bg-green-500 p-3 rounded-lg mb-6 text-white uppercase font-bold text-center">
                    {{ session('mensaje') }}       
                </div>
            @endif
            <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
            <form action="{{ route('comentarios.store', ['user' => $user, 'post' => $post]) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Añade un comentario</label>
                    <textarea 
                        id="comentario"
                        name="comentario"
                        placeholder="Tu comentario"
                        class="border p-3 w-full rounded-md @error('comentario') border-red-600 @enderror"
                    ></textarea>
                    @error('comentario')
                        <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm">{{ $message }}</p>
                    @enderror
                </div>

                <input 
                    type="submit"
                    value="Comentario"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors duration-200 w-full text-white p-3 rounded-md"
                >
            </form>
        </div>
        @endauth

        <!-- Lista de comentarios -->
        <div class="bg-white shadow max-h-96 overflow-scroll rounded-2xl p-4">
            @if($post->comentarios->count())
                @foreach ($post->comentarios as $comentario)
                    <div class="flex flex-col w-full py-4 mx-auto mt-3 bg-white border-b-2 border-gray-200 sm:px-4 sm:py-4 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <img class="w-12 h-12 border-2 border-gray-300 rounded-full" alt="Avatar" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&auto=format&fit=facearea&faces=1&faceindex=1&facepad=2.5&w=500&h=500&q=80">
                            <div class="ml-4">
                                <div class="flex items-center">
                                    <a href="{{ route('post.index', $comentario->nombreDelComentario->username) }}" class="font-bold text-lg text-gray-800">{{ $comentario->nombreDelComentario->username }}</a>
                                    <span class="ml-2 text-xs text-gray-500">{{ $comentario->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-sm text-gray-700 mt-2">{{ $comentario->comentario }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-500">No hay comentarios</p>
            @endif
        </div>
    </div>
</div>

@endsection
