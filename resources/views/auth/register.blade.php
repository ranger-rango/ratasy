<x-layout>

    <x-form-error />
        
    <x-form-field method="POST" action="/register">

        <x-form-input type="text" name="first_name" id="first_name" placeholder="First Name"/>
        <x-form-input type="text" name="last_name" id="last_name" placeholder="Last Name" />
        <x-form-input type="email" name="email" id="email" placeholder="example@example.com" />
        <x-form-input type="password" name="password" id="password" placeholder="Password" />
        <x-form-input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" />

        <x-form-button>Register</x-form-button>

    </x-form-field>
</x-layout>