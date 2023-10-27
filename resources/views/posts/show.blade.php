<x-app-layout>
    <div class="container py-8 px-8">
        <h1 class="text-4xl font-bold text-gray-600">{{ $post->title }}</h1>

        <div class="text-lg text-gray-400 mb-2">
            {{ $post->extract }}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- contenido --}}
            
            <div class="col-span-1 lg:col-span-2">
                <figure>
                    <img class="w-full h-80 object-center object-cover" src="{{ Storage::url($post->photo->url) }}" alt="">
                </figure>

                <div class="text-base text-gray-500 mt-4 text-justify">
                    {{ $post->description }}
                </div>
            </div>

            {{-- articulos relacionados--}}
            <aside>
                <h1 class="font-bold text-3xl mb-4 text-center text-gray-600">Más de {{ $post->category->name }} </h1>

                @foreach ($related as $r)
                    <a href="{{ route('posts.show', $r) }}">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="col-span-2 text-center text-2xl font-bold text-gray-600">
                                {{ $r->title }}
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <figure>
                                    <img class="w-full h-30 object-center object-cover" src="{{ Storage::url($r->photo->url) }}" alt="">
                                </figure>
                            </div>
                            <div class="text-justify text-gray-400">
                                {{ Str::substr($r->created_at, 0, 10)  . ' - ' . $r->extract }}
                            </div>
                        </div>

                        <hr>
                    </a>
                @endforeach
            </aside>
        </div>
    </div>
</x-app-layout>