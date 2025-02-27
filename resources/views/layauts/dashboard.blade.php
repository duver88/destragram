@extends('layauts.app')
@section('titulo')
    tu cuenta
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 md:flex ">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{asset('img/usuario.svg')}}" alt="Imagen Usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <p>{{auth()->user()->username }}</p>
            </div>
        </div>
    </div>
@endsection