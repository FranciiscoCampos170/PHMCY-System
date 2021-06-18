<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Type;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;
    public $product_name, $reference, $barCode,
           $quantity = 1, $alertQuantity = 1, $description,
           $image,$category_id,$brand_id,
           $type_id,$unity;

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
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }
    public function submitProduct(): void
    {
        $this->validate();
        $product = New Product();
        $product->name = $this->product_name;
        $product->reference = $this->reference;
        $product->bar_code = $this->barCode;
        $product->quantity = $this->quantity;
        $product->alert_quantity = $this->alertQuantity;
        $product->description = $this->description;
        $product->category_id = $this->category_id;
        $product->brand_id = $this->brand_id;
        $product->type_id = $this->type_id;
        $product->unity = $this->unity;
        if (!empty($this->image))
        {
            $filename = $product->id . $this->image->store('products');
            $product->image = $filename;
        }else{
            $product->image = $product->id . "product_default.jpg";
        }
        $product->save();

        $this->dispatchBrowserEvent('swal:modal', [

            'type' => 'success',

            'message' => 'Produto adicionado ao stock com sucesso!'

        ]);

       //session()->flash('success_message', 'Produto Adicionado com Sucesso!');


    }

    public function render()
    {
        return view('livewire.create-product',
                    ['categories' => Category::all(),
                     'brands' => Brand::all(),
                     'types' => Type::all()]
            );
    }
}
