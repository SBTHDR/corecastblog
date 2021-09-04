@props(['post'])
<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-200 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl bg-gray-100']) }}>
    <div class="py-6 px-5">
        <div>
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <a href="/categories/{{ $post->category->slug }}"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{ $post->category->name }}
                    </a>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/post/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>
                    {{ $post->excerpt }}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="{{ asset('/images/lary-avatar.svg') }}" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">{{ $post->author->username }}</h5>
                    </div>
                </div>

                <div>
                    <a href="/post/{{ $post->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
