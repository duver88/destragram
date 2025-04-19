@extends('layauts.app')

@section('titulo')
    Editar Perfil {{ auth()->user()->username}}
@endsection

@section('contenido')

<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
        <form  method="POST" action="{{ route('modificar.store')}}" enctype="multipart/form-data" class="mt-10 md:mt-0">
            @csrf
            <div class="mb-4">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold ">Username</label>
                <input 
                id="username"
                name="username"
                type="text"
                placeholder="Tu nuevo User Name"
                class="border p-3 w-full rounded-md @error('username') border-red-600 @enderror"
                value=""
                />
                @error('username')
                <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold ">Imagen Perfil</label>
                <input 
                id="imagen"
                name="imagen"
                type="file"
                class="border p-3 w-full rounded-md"
                accept=".jpg, .jpeg, .png"
                />
            
            </div>

            <div class="mb-4">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold ">Email</label>
                <input 
                id="email"
                name="email"
                type="email"
                placeholder="Tu Email"
                class="border p-3 w-full rounded-md @error('email') border-red-600 @enderror"
                value="{{ auth()->user()->email }}"
                >
                @error('email')
                <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold ">Contraseña Actual</label>
                <input 
                id="password"
                name="password"
                type="password"
                placeholder="Tu contraseña Actual"
                class="border p-3 w-full rounded-md @error('password') border-red-600 @enderror"
                value=""
                >
                @error('password')
                <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                @enderror

                @if (session('mensaje'))
                <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm">
                {{ session('mensaje') }}</p>
                @endif
            </div>


            <div class="mb-4">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold ">Contraseña Nueva</label>
                <input 
                id="passwordnew"
                name="passwordnew"
                type="password"
                placeholder="Tu contraseña Nueva"
                class="border p-3 w-full rounded-md @error('passwordnew') border-red-600 @enderror"
                value=""
                >
                @error('password')
                <p class="bg-red-600 text-white p-2 text-center rounded-md text-sm my-2 shadow-sm"> {{ $message }}</p>
                @enderror
            </div>

            <input 
            type="submit"
            value="Guardar Cambios"
            class="bg-sky-600 hover:bg-sky-700 transition-colors duration-200 w-full text-white p-3 rounded-md"
            >
        </form>
    </div>
</div>


@endsection