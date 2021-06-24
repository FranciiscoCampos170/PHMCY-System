<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Type;
use Livewire\Component;

class EditProduct extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.edit-product',
                    ['categories' => Category::all(),
                     'brands' => Brand::all(),
                     'types' => Type::all()]);
    }
}
