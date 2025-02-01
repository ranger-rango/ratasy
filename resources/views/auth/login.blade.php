<x-layout>

    <x-form-error />
    
    <x-form-field method="POST" action="/login">
        <x-form-input type="email" name="email" id="email" placeholder="example@example.com" />
        <x-form-input type="password" name="password" id="password" placeholder="Password" />

        <x-form-button>Login</x-form-button>
        
    </x-form-field>
</x-layout>