<x-layout>
    
    
    <x-form-field method="POST" action="/logs">
        <h2>Goods Delivery Logging</h2>
        <x-form-error />
        
        <x-category-select />
        <x-form-input type="number" step="0.01" name="unit_price" id="unit_price" placeholder="Unit Price" />
        <x-form-input type="number" step="0.01" name="total_weight" id="total_weight" placeholder="Total Weight" />

        <x-form-button>Submit</x-form-button>
    </x-form-field>


</x-layout>