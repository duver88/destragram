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
        <header class="bg-white shadow-md">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                
                <!-- LOGO -->
                <a href="{{ route('home') }}" class="text-4xl font-extrabold text-indigo-600 hover:text-indigo-800 transition duration-300">
                    Destagram
                </a>
        
                <!-- NAVEGACIÓN -->
                <nav class="flex items-center space-x-4">
                    @auth
                        <!-- Botón Crear -->
                        <a href="{{ route('create.index') }}" class="flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition duration-300 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span class="hidden sm:inline">Crear Post</span>
                        </a>
        
                        <!-- Perfil -->
                        <a href="{{ route('post.index', Auth::user()) }}" class="flex items-center gap-2 text-gray-700 hover:text-indigo-600 transition duration-300">
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}" alt="avatar" class="w-8 h-8 rounded-full">
                             <span class="hidden sm:inline font-semibold">{{ auth()->user()->username }}</span>
                        </a>
        
                        <!-- Cerrar sesión -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition duration-300 text-sm shadow-sm">
                                Cerrar sesión
                            </button>
                        </form>
        
                    @endauth
        
                    @guest
                        <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-gray-600 hover:text-indigo-600 transition duration-300">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-full hover:bg-indigo-700 transition duration-300 shadow-sm">
                            Crear cuenta
                        </a>
                    @endguest
                </nav>
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

