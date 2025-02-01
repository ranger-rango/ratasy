@props(['visibility' => ''])
<div class="flex justify-center pb-10 border-b border-b-white/20 {{ $visibility }}">
    <form {{ $attributes }} class = "w-full space-y-7">
        @csrf
        
        {{ $slot }}
    </form>
</div>