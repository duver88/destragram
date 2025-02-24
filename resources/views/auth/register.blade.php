@extends('layauts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-5 md:items-center">
        <div class="md:w-7/12 rounded-md ">
            <img class="rounded-md"     src="{{ asset('img/registrar.jpg') }}" alt="Imagen de registro Usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-5 rounded-md shadow-md">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold ">Nombre</label>
                    <input 
                    id="name"
                    name="name"
                    type="text"
                    placeholder="Tu nombre"
                    class="border p-3 w-full rounded-md @error('name') border-red-600 @enderror"
                    value="{{ old('name') }}"
                    />
                    @error('name')
                    <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold ">UserName</label>
                    <input 
                    id="username"
                    name="username"
                    type="text"
                    placeholder="Tu Nombre de Usuario"
                    class="border p-3 w-full rounded-md @error('username') border-red-600 @enderror"
                    value="{{ old('username') }}"
                    >
                    @error('username')
                    <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                    @enderror
                </div>

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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold ">Repetir Contraseña</label>
                    <input 
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    placeholder="Repite tu contraseña"
                    class="border p-3 w-full rounded-md @error('password_confirmation') border-red-600 @enderror"
                    value="{{ old('password_confirmation') }}"
                    >
                    @error('password_confirmation')
                    <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                    @enderror
                </div>

                <input 
                type="submit"
                value="Crear Cuenta"
                class="bg-sky-600 hover:bg-sky-700 transition-colors duration-200 w-full text-white p-3 rounded-md"
                >
               
            </form>
        </div>

    </div>
@endsection