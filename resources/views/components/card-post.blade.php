@props(['p'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    <figure>
        <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($p->photo->url) }}" alt="">
    </figure>

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $p->id) }}">
                {{ $p->title }}
            </a>
        </h1>
        <div class="text-gray-700 text-base">
            {{ $p->extract }}
        </div>
    </div>
    <div class="px-10 pt-1 pb-1">
        @foreach ($p->tags as $tag)
            <a href="{{ route('posts.tag', $tag) }}" class="inline-block px-3 bg-gray-600 text-white rounded-full text-xs">
                {{ $tag->name }}
            </a>
        @endforeach
    </div>
</article>