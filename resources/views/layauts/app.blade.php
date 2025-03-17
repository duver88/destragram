<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('style')
        <title>Destagram - @yield('titulo')</title>

       @vite('resources/css/app.css')
       @vite('resources/js/app.js')

   
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    Destagram
                </h1>
                @auth
                
                <nav class="flex gap-2 items-center">

                    <a href="{{ route('create.index')}}" class="flex items-center gap-2 bg-white border p-2 text-gray-500 rounded-sm uppercase font-bold cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15m0-3-3-3m0 0-3 3m3-3V15" />
                          </svg>
                          
                        Crear 
                    </a>
                    <a href="{{ route('post.index', Auth::user())}}">
                        <p>Bienvenido <span class="text not-sr-only font-bold">{{ auth()->user()->username }}</span></p>
                    </a>
                    

                    <form  method="POST" action="{{ route('logout')}}">
                        @csrf
                        <button type="submit" class="uppercase text-gray-600 text-sm"> cerrar sesión </button>
                    </form>
                    
                    
                </nav>
                @endauth

                @guest
                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route ('login')}}">Login</a>
                    
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear Cuenta</a>
                </nav>
                @endguest
                
            </div>

        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10" >@yield('titulo')</h2>
            @yield('contenido')
        </main>

        <footer class="text-center p-5 text-gray-500 font-bold uppercase mt-10">
            Destagram - Todos los derechos reservador
            {{now()->format('Y M H:i')}}
            Duberney 
        </footer>

       
  
    </body>
</html>

