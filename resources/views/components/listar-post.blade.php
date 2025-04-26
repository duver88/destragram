<div>
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
    @if ($posts->count())
    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
            <div>

                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user->username]) }}">
                    <img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="{{ $post->titulo}}">
                </a>
            </div>
        @endforeach
        </div>
    </section>
    @else
       <p>No hay post</p>
    @endif
</div>