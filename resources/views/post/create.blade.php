@extends('layauts.app')

@push('style')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
@section('name')
    Crea Una Nueva Publicación
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10 ">
          <form action="{{ route('imagen.index')}}" id="dropzone" method="POST" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96 rouded flex flex-col justify-center items-center">@csrf</form> 
        </div>

        <div class="md:w-1/2 px-10 bg-white p-5 rounded-md shadow-md md:mt-0 mt-10">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold ">Titulo</label>
                    <input 
                    id="titulo"
                    name="titulo"
                    type="text"
                    placeholder="Tu titulo"
                    class="border p-3 w-full rounded-md @error('titulo') border-red-600 @enderror"
                    value="{{ old('titulo') }}"
                    />
                    @error('titulo')
                    <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold ">descripción </label>
                    <textarea 
                    id="descripcion"
                    name="descripcion"
                    placeholder="Tu Descripción "
                    class="border p-3 w-full rounded-md @error('descripcion') border-red-600 @enderror"
                    >{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                    <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                    @enderror
                </div>

               <div class="mb-5">
                    <input 
                    name="imagen"
                    type="hidden"
                    value="{{ old('imagen') }}"
                    >
                    @error('imagen')
                    <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                    @enderror

               </div>

                <input 
                type="submit"
                value="Crear Post"
                class="bg-sky-600 hover:bg-sky-700 transition-colors duration-200 w-full text-white p-3 rounded-md"
                >

            </form>
        </div>

    </div>
@endsection
