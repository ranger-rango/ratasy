<x-layout>

    <table>
        <thead>
            <tr class="bg-gray-500">
                {{-- <x-table-data>Name</x-table-data> --}}
                <x-table-data>Category</x-table-data>
                <x-table-data>Unit Price</x-table-data>
                <x-table-data>Total Weight</x-table-data>
                <x-table-data>Total Price</x-table-data>
                <x-table-data>Date</x-table-data>
            </tr>
        </thead>

        <tbody>
            @php
                $total_weight = 0;
                $total_price = 0;
            @endphp
            @foreach ($records as $record)
                <tr>
                    {{-- <x-table-data> {{ $record->user->first_name }} </x-table-data> --}}
                    <x-table-data> {{ $record->category }} </x-table-data>
                    <x-table-data> {{ $record->unit_price }} </x-table-data>
                    <x-table-data> {{ $record->total_weight }} </x-table-data>
                    <x-table-data> {{ $record->total_price }} </x-table-data>
                    <x-table-data> {{ $record->created_at }} </x-table-data>
                </tr>

                @php
                    $total_weight += $record->total_weight;
                    $total_price += $record->total_price;
                @endphp
            @endforeach

            <tr>
                <x-table-data><strong>Total</strong></x-table-data>
                {{-- <x-table-data></x-table-data> --}}
                <x-table-data></x-table-data>
                <x-table-data><strong>{{ $total_weight }}</strong></x-table-data>
                <x-table-data><strong>{{ $total_price }}</strong></x-table-data>
                <x-table-data></x-table-data>
            </tr>
        </tbody>
    </table>

</x-layout>