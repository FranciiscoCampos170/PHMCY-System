<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Product extends Component
{
    public function render()
    {
        return view('livewire.product', ['products' => \App\Models\Product::get()]);
    }
}
