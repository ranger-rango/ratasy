@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="text-red-500 italic"> {{ $error }} </li>
        @endforeach
    </ul>
@endif