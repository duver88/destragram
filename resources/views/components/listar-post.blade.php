<div>
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
    @if ($posts->count())
    <section class="container mx-auto mt-12">
        <h2 class="text-4xl text-center font-extrabold text-gray-800 my-10">Publicaciones</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach ($posts as $post)
            <div class="group relative rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl">
                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user->username]) }}">
                    <img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="{{ $post->titulo}}" class="w-full h-64 object-cover group-hover:opacity-80 transition duration-300">
                </a>
                <div class="absolute inset-0 bg-gradient-to-t from-black opacity-30 group-hover:opacity-0 transition duration-300"></div>
                <div class="absolute bottom-4 left-4 right-4 text-white font-semibold text-lg group-hover:text-yellow-400 transition duration-300">
                    <p>{{ $post->titulo }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @else
    <p class="text-center text-xl text-gray-500 mt-10">No hay publicaciones disponibles.</p>
    @endif
</div>
