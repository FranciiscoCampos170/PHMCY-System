<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $selectedProducts = [];
    public $deleteDisabled = false;

    public function mount()
    {
        $this->selectedProducts = collect();
    }
    public function render()
    {
        $this->deleteDisabled = count($this->selectedProducts) > 0;
        return view('livewire.product', ['products' => \App\Models\Product::get()]);
    }

    public function deleteSelected()
    {
        \App\Models\Product::query()
            ->whereIn('id', $this->selectedProducts)
            ->delete();
        $this->selectedProducts = [];
;    }
}
