<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
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
        $quantity, $alertQuantity, $description,
        $image,$category_id,$brand_id,
        $type_id,$unity, $price = 100.000;

    protected $rules = [
        'product_name' => 'required|min:2',
        'reference' => 'required|min:2',
        'barCode' => 'required|min:2',
        'quantity' => 'required',
        'alertQuantity' => 'required',
        'category_id' => 'required',
        'brand_id' => 'required',
        'type_id' => 'required'
    ];

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
        $this->alertQuantity =  $productInfo->alert_quantity;
        $this->description =  $productInfo->description;
        $this->image =  $productInfo->image;
        $this->category_id =  $productInfo->category_id;
        $this->brand_id = $productInfo->brand_id;
        $this->type_id = $productInfo->type_id;
        $this->unity = $productInfo->unity;
        $this->price = 100000;
        $this->dispatchBrowserEvent('openModal');
    }
    public function deleteSelected()
    {
        \App\Models\Product::query()
            ->whereIn('id', $this->selectedProducts)
            ->delete();
        $this->selectedProducts = [];
   }




   public function updateProduct(): void
   {
       $this->validate();
       $productInfo = \App\Models\Product::query()
                                    ->where('id', $this->productId)
                                    ->firstOrFail();

       $productInfo->name = $this->product_name;
       $productInfo->reference = $this->reference;
       $productInfo->bar_code = $this->barCode;
       $productInfo->quantity = $this->quantity;
       $productInfo->alert_quantity = $this->alertQuantity;
       $productInfo->description = $this->description;
       $productInfo->category_id = $this->category_id;
       $productInfo->brand_id = $this->brand_id;
       $productInfo->type_id = $this->type_id;
       $productInfo->unity = $this->unity;
       $productInfo->price = $this->price;
       $productInfo->save();
       $this->dispatchBrowserEvent('swal:modal', [

           'type' => 'success',

           'message' => 'Produto editado com sucesso!'

       ]);
   }

   public function closeEditProductModal()
   {
       $this->dispatchBrowserEvent('closeEditProductModal');
   }

}
