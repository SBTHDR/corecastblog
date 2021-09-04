<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="{{ asset('/images/logo.svg') }}" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @auth()
                <div class="flex items-center">
                    <x-dropdown>
                        <x-slot name="toggle">
                            <div class="flex items-center">
                                <button class="text-lg font-bold mr-10">{{ ucwords(auth()->user()->username) }}</button>
                                <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                                     height="22" viewBox="0 0 22 22">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                                        <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                                    </g>
                                </svg>
                            </div>
                        </x-slot>

                        @can('admin')
                            <x-dropdown-item href="/admin/dashboard">Dashboard</x-dropdown-item>
                            <x-dropdown-item href="/admin/posts/create" :active="request()->routeIs('/admin/posts/create')">New Post</x-dropdown-item>
                        @endcan

                        <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Logout</x-dropdown-item>


                        <form action="/logout" method="post" id="logout-form" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown>
                </div>
            @else
                <div class="flex items-center">
                    <a href="/register" class="text-xs font-bold uppercase mr-3">Register</a>
                    <a href="/login" class="text-xs font-bold uppercase">Login</a>
                </div>
            @endauth

            <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>

    {{ $slot }}

    <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="{{ asset('/images/lary-newsletter-icon.svg') }}" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="#" class="lg:flex text-sm">
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="{{ asset('/images/mailbox-icon.svg') }}" alt="mailbox letter">
                        </label>

                        <input id="email" type="text" placeholder="Your email address"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>
</section>

    @if(session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="inline-block p-3 fixed bg-blue-500 bottom-3 right-3 rounded-xl text-white">
            <p>{{ session('success') }}</p>
        </div>
    @endif

</body>
