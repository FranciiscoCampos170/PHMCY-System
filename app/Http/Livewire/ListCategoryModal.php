<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class ListCategoryModal extends Component
{

    public function render()
    {
        return view('livewire.list-category-modal', ['categories' => Category::all()]);
    }
}
