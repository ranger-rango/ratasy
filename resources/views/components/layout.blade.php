<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Ratasy</title>
</head>
<body class="bg-gray-900 text-white text-xs">
    <div class="px-5">
        <div class="flex justify-center py-3">
            <a href="/" class="font-bold text-xl">Ratasy</a>
        </div>
        <nav class="flex justify-center py-3 border-b border-white/30 font-bold">
            {{-- <div>
                <a href="/">Ratasy</a>
            </div> --}}
            
            @auth
                <div class="space-x-5">
                    <x-blink href="/logs" >Log</x-blink>
                    <x-blink href="/expenses">Capital</x-blink>
                    <x-blink href="/reports">Reports</x-blink>
                    <x-blink href="/ledgers">Ledger</x-blink>
                    <button form="logout-form" class="bg-gray-500 p-1 rounded-lg">Logout</button>
                </div>
            @endauth

            @guest
                <div class="space-x-10">
                    {{-- <a href="" class="bg-gray-500 p-2 rounded-lg">Login</a> --}}
                    <x-blink href="/login">Login</x-blink>
                </div>
            @endguest

            <x-form-field method="POST" action="/logout" id="logout-form" visibility="hidden"></x-form-field>
        </nav>

        <main class="mt-3 max-w-[960px] mx-auto text-sm">
            {{ $slot }}
        </main>
    </div>
</body>
</html>