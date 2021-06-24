<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;
    public $selectedProducts = [];
    public $deleteDisabled = false;
    public $search;
    protected $queryString = ['search'];
    public $productId;

    public $product_name, $reference, $barCode,
        $quantity = 1, $alertQuantity = 1, $description,
        $image,$category_id,$brand_id,
        $type_id,$unity, $price = 100.000;


    public function mount()
    {
        $this->selectedProducts = collect();
    }
    public function render()
    {
        $this->deleteDisabled = count($this->selectedProducts) > 0;
        return view('livewire.product', ['products' => \App\Models\Product::where(function ($query){
            $query->where('name', 'like','%'.$this->search.'%')
                 ->orWhere('reference', 'like','%'.$this->search.'%')
                 ->orWhere('bar_code', 'like','%'.$this->search.'%');
        })->paginate(10)
        ], ['categories' => Category::all(),
            'brands' => Brand::all(),
            'types' => Type::all()]);
    }
    public function edit($productId)
    {
        $this->productId = $productId;
        $productInfo = \App\Models\Product::query()
                                            ->whereId($productId)
                                            ->firstOrFail();
        $this->product_name = $productInfo->name;
        $this->reference =   $productInfo->reference;
        $this->barCode =  $productInfo->bar_code;
        $this->quantity =  $productInfo->quantity;
        $this->alertQuantity =  $productInfo->alertQuantity;
        $this->description =  $productInfo->description;
        $this->image =  $productInfo->image;
        $this->category_id =  $productInfo->category_id;
        $this->brand_id = $productInfo->brand_id;
        $this->type_id = $productInfo->type_id;
        $this->unity = $productInfo->unity;
        $this->price = 100.000;
        $this->dispatchBrowserEvent('openModal');
    }
    public function deleteSelected()
    {
        \App\Models\Product::query()
            ->whereIn('id', $this->selectedProducts)
            ->delete();
        $this->selectedProducts = [];
;    }
}
