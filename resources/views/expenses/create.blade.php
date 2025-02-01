<x-layout>
    <x-form-field method="POST" action="/expenses" >
        <h2>Add Operating Capital</h2>
        
        <x-form-input type="number" step="0.01" name="amount" id="amount" placeholder="Operating Capital" />
        <x-form-button>Submit</x-form-button>
    </x-form-field>

    
    <x-form-field method="POST" action="/expenses">
        <div class="flex space-x-5 w-full justify-center">
        
            <div class="space-x-1 ">
                <label for="from">From</label>
                <input type="date" name="from" id="from" class="p-3 rounded-lg text-black">
            </div>
    
            <div class="space-x-1 ">
                <label for="to">To</label>
                <input type="date" name="to" id="to" class="p-3 rounded-lg text-black">
            </div>
        </div>

        <div>
            <x-form-button>Filter</x-form-button>
        </div>

    </x-form-field>


    <table class="mt-7 w-full">
        <thead>
            <tr class="bg-gray-500">
                <x-table-th></x-table-th>
                <x-table-th>Capital</x-table-th>
                <x-table-th>Date</x-table-th>
            </tr>
        </thead>

        <tbody>
            @php
                $total_expense = 0;
            @endphp
            @foreach ($expenses as $expense)
                <tr>
                    <x-table-data></x-table-data>
                    <x-table-data> {{ $expense->amount }} </x-table-data>
                    <x-table-data> {{ $expense->created_at }} </x-table-data>
                </tr>

                @php
                    $total_expense += $expense->amount;
                @endphp
            @endforeach

            <tr>
                <x-table-data><strong>Total</strong></x-table-data>
                <x-table-data><strong> {{ $total_expense }} </strong></x-table-data>
                <x-table-data><strong></strong></x-table-data>
            </tr>
        </tbody>
    </table>
</x-layout>