@extends('layauts.app')
@push('style')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('name')
    Crea Una Nueva Publicación
@endsection

@section('contenido')
    <div class="md:flex md:items-center md:justify-between">
        <!-- Sección para subir imagen -->
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagen.index')}}" id="dropzone" method="POST" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96 rounded-lg flex flex-col justify-center items-center p-5">
                @csrf
                <div class="text-center text-gray-500">
                    <p class="text-xl">Arrastra tu imagen aquí o haz clic para subir</p>
                    <span class="text-sm">Soporta imágenes en formato JPG, PNG</span>
                </div>
            </form>
        </div>

        <!-- Sección para crear el post -->
        <div class="md:w-1/2 px-10 bg-white p-8 rounded-lg shadow-lg md:mt-0 mt-10">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <!-- Titulo -->
                <div class="mb-6">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-semibold">Titulo</label>
                    <input 
                        id="titulo"
                        name="titulo"
                        type="text"
                        placeholder="Escribe el título del post"
                        class="border p-3 w-full rounded-md @error('titulo') border-red-600 @enderror"
                        value="{{ old('titulo') }}"
                    />
                    @error('titulo')
                    <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Descripción -->
                <div class="mb-6">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-semibold">Descripción</label>
                    <textarea 
                        id="descripcion"
                        name="descripcion"
                        placeholder="Escribe una descripción para tu publicación"
                        class="border p-3 w-full rounded-md @error('descripcion') border-red-600 @enderror"
                    >{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                    <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Imagen (oculto) -->
                <div class="mb-6">
                    <input 
                        name="imagen"
                        type="hidden"
                        value="{{ old('imagen') }}"
                    >
                    @error('imagen')
                    <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botón de envío -->
                <div class="mt-6">
                    <input 
                        type="submit"
                        value="Crear Post"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors duration-200 w-full text-white p-3 rounded-md cursor-pointer"
                    >
                </div>
            </form>
        </div>
    </div>
@endsection
