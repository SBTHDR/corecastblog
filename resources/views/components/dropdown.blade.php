@props(['toggle'])

<div x-data="{ show: false }" @click.away="show = false">
    <div @click="show = !show">
        {{ $toggle }}
    </div>

    <div x-show="show" class="absolute bg-gray-100 w-full mt-2 rounded-md z-50" style="display: none">
        {{ $slot }}
    </div>
</div>
