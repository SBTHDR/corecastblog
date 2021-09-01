<x-layout>
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/post/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>

            <p>
                By <a href="/authors/{{ $post->author->id }}">{{ $post->author->username }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>

            <h5>
                {{ $post->excerpt }}
            </h5>
        </article>
    @endforeach
</x-layout>
