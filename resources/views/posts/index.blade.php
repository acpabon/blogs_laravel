<x-app-layout>
    <div class="container bg-indigo-500 mx-auto max-w-7xl px-2 sm:px-6 lg:px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 py-8">
            @foreach ($posts as $p)
                <article class="w-full h-80 bg-cover @if($loop->first) col-span-1 md:col-span-2 @endif" style="background: url({{ Storage::url($p->photo->url) }}); background-position: center; background-size: cover; height: 200px;">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            {{-- {{ $p->tags }} --}}
                            @foreach ($p->tags as $tag)
                                <a href="{{ route('posts.tag', $tag) }}" class="inline-block px-3 bg-gray-600 text-white rounded-full text-xs">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                        <h1 class="text-3xl text-white leading-8 font-bold">
                            <a href="{{ route('posts.show', $p) }}">
                                {{ $p->title }}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>