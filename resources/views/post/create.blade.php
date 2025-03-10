@extends('layauts.app')

@section('name')
    Crea Una Nueva Publicación
@endsection


@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10 ">
            Imagen aca 
        </div>

        <div class="md:w-1/2 px-10 bg-white p-5 rounded-md shadow-md md:mt-0 mt-10">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold ">Titulo</label>
                    <input 
                    id="titulo"
                    name="titulo"
                    type="text"
                    placeholder="Tu titulo"
                    class="border p-3 w-full rounded-md @error('titulo') border-red-600 @enderror"
                    value="{{ old('titulo') }}"
                    />
                    @error('name')
                    <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold ">descripción </label>
                    <textarea 
                    id="descripción "
                    name="descripción "
                    placeholder="Tu Descripción "
                    class="border p-3 w-full rounded-md @error('titulo') border-red-600 @enderror"
                    />{{ old('descripción') }}</textarea>
                    @error('name')
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
