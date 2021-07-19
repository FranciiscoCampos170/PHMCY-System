<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class POS extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $productsSelected = [];
    public $productsToSell;
    public $category;
    public $search;

    protected $queryString = ['search', 'category'];

    public function mount()
    {
        $this->productsSelected = collect();
        $this->productsToSell = [];
    }
    public function addToCart($productId)
    {
        $cart = Cart::where('product_id', $productId)->first();
        $item = \App\Models\Product::whereId($productId)->first();
        if ($item->quantity < 1){
            $this->dispatchBrowserEvent('openStockAlert');
        }else{
            $item->quantity = $item->quantity - 1;
            $item->save();
            if (!$cart) {
                    Cart::create(['product_id' => $productId, 'qtd' => 1]);
            }else{
                $cart->update(['qtd' => $cart->qtd + 1]);
            }
        }

        $this->emit('updateCart');
    }

    /*public function updated()
    {
        $this->productsToSell = \App\Models\Product::query()
        ->whereIn('id', $this->productsSelected)
        ->get();

        //actualiazer o total e o subtotal
    }*/
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function seachByCategory()
    {
        $this->resetPage();
    }

    public function openCategory()
    {
        $this->dispatchBrowserEvent('openCategoryModal');
    }

    public function addCustomer()
    {
        $this->dispatchBrowserEvent('addCustomer');
    }

    public function render()
    {
        return view('livewire.p-o-s', ['products' => \App\Models\Product::where(function($query){
            $query->where('name', 'like', '%'.$this->search.'%')
                  ->orWhere('reference', 'like','%'.$this->search.'%')

            ->when($this->category, function ($query){
                $query->where('category_id', $this->category);
            });
        })->paginate(8), 'categories' => Category::all()]);
    }
}
