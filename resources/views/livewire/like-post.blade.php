<div class="flex items-center space-x-2">
    {{-- Texto motivacional sobre la competencia --}}
    <button 
        wire:click="like"
        class="focus:outline-none p-2 rounded-full hover:bg-gray-200 transition duration-300 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" 
             fill="{{ $isLike ? 'red' : 'blue' }}" 
             viewBox="0 0 24 24" 
             stroke-width="1.5" 
             stroke="currentColor" 
             class="w-8 h-8 transition duration-300 ease-in-out">
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
        </svg>
    </button>
    <span class="text-lg font-semibold text-gray-700">{{ $likes }} Likes</span>
</div>
