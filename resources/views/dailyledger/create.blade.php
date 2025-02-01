<x-layout>

    <x-form-error />

    <x-form-field method="POST" action="/ledgers">
        <div class="flex space-x-2 w-full justify-center">
            <div class="space-x-1 ">
                <label for="from">From</label>
                <input type="date" name="from" id="from" class="p-2 rounded-lg text-black w-30">
            </div>
    
            <div class="space-x-1 ">
                <label for="to">To</label>
                <input type="date" name="to" id="to" class="p-2 rounded-lg text-black w-30">
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
                <x-table-th>Capital</x-table-th>
                <x-table-th>Expenses</x-table-th>
                <x-table-th>Balance</x-table-th>
                <x-table-th>Date</x-table-th>
            </tr>
        </thead>

        <tbody>
            @php
                $total_moneyin = 0;
                $total_expenses = 0;
            @endphp
            @foreach ($records as $record)
                <tr>
                    {{-- <x-table-data> {{ $record->user->first_name }} </x-table-data> --}}
                    <x-table-data> {{ $record->money_in }} </x-table-data>
                    <x-table-data> {{ $record->expenses }} </x-table-data>
                    <x-table-data> {{ $record->balance }} </x-table-data>
                    <x-table-data> {{ $record->date }} </x-table-data>
                </tr>

                @php
                    $total_moneyin += $record->money_in;
                    $total_expenses += $record->expenses;
                @endphp
            @endforeach

            <tr>
                <x-table-data><strong>{{ $total_moneyin }}</strong></x-table-data>
                <x-table-data><strong>{{ $total_expenses }}</strong></x-table-data>
                <x-table-data><strong> {{ $total_moneyin - $total_expenses }} </strong></x-table-data>
                <x-table-data><strong>Total</strong></x-table-data>
            </tr>
        </tbody>
    </table>

    {{-- <div class="mt-5">
        {{ $records->links() }}
    </div> --}}
</x-layout>