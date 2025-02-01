<x-layout>

    <x-form-error />

    <x-form-field method="POST" action="/reports">
        <div class="flex space-x-2 w-full justify-center">
            <div><x-category-select /></div>
        
            <div class="space-x-1 ">
                <label for="from">From</label>
                <input type="date" name="from" id="from" class="p-2 rounded-lg text-black w-10">
            </div>
    
            <div class="space-x-1 ">
                <label for="to">To</label>
                <input type="date" name="to" id="to" class="p-2 rounded-lg text-black w-10">
            </div>
        </div>

        <div>
            <x-form-button>Filter</x-form-button>
        </div>

    </x-form-field>


    <table class="mt-7 w-full">
        <thead>
            <tr class="bg-gray-500">
                {{-- <x-table-data>Name</x-table-data> --}}
                <x-table-th>Category</x-table-th>
                <x-table-th>Unit Price</x-table-th>
                <x-table-th>Total Weight</x-table-th>
                <x-table-th>Total Price</x-table-th>
                <x-table-th>Date</x-table-th>
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

    {{-- <div class="mt-5">
        {{ $records->links() }}
    </div> --}}
</x-layout>