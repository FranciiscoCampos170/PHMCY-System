<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateProduct extends Component
{
    public $product_name, $reference, $barCode,
           $quantity = 1, $alertQuantity = 1, $description,
           $image,$category,$brand,
           $type,$unity;

    protected $rules = [
        'product_name' => 'required|min:2',
        'reference' => 'required|min:2',
        'barCode' => 'required|min:2',
        'quantity' => 'required',
        'alertQuantity' => 'required'
    ];
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }
    public function submitProduct(): void
    {
        $this->validate();

        session()->flash('success_message', 'Produto Adicionado com Sucesso!');


    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
