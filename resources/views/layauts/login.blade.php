@extends('layauts.app')

@section('titulo')
    Inicia Seción en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-5 md:items-center">
        <div class="md:w-7/12 rounded-md ">
            <img class="rounded-md"     src="{{ asset('img/login.jpg') }}" alt="Imagen de registro Usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-5 rounded-md shadow-md">
            <form method="POST" action="{{route('login')}}">
                @csrf

                

                <div class="mb-4">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold ">Email</label>
                    <input 
                    id="email"
                    name="email"
                    type="email"
                    placeholder="Tu Email"
                    class="border p-3 w-full rounded-md @error('email') border-red-600 @enderror"
                    value="{{ old('email') }}"
                    >
                    @error('email')
                    <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold ">Contraseña</label>
                    <input 
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Tu contraseña"
                    class="border p-3 w-full rounded-md @error('password') border-red-600 @enderror"
                    value="{{ old('password') }}"
                    >
                    @error('password')
                    <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <input type="checkbox" name="remember">
                    <label class="text-gray-500 font-bold">Mantener Sesión Abierta</label>
                </div>

                <input 
                type="submit"
                value="Iniciar Sección"
                class="bg-sky-600 hover:bg-sky-700 transition-colors duration-200 w-full text-white p-3 rounded-md"
                >

                @if (session('mensaje'))
                <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm">
                {{ session('mensaje') }}</p>
                
                    
                @endif
               
            </form>
        </div>

    </div>
@endsection