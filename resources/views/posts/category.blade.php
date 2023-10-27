<x-app-layout>

    <div class="container py-8 px-8">
        <h1 class="text-center font-medium text-3xl mb-2">
            {{ $category->name }}
        </h1>
        @foreach ($posts as $p)
            <x-card-post :p="$p" />
        @endforeach
        
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>


</x-app-layout>