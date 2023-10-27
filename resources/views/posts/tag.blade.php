<x-app-layout>

    <div class="max-w-5xl mx-auto py-8 px-2">
        <h1 class="text-center uppercase font-bold text-3xl mb-2">
            Etiqueta: {{ $tag->name }}
        </h1>
        @foreach ($posts as $p)
            <x-card-post :p="$p" />
        @endforeach
        
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>


</x-app-layout>