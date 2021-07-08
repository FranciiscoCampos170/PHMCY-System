<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class POS extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $productsSelected = [];
    public $productsToSell;
    public $subtotal;
    public $search;
    protected $queryString = ['search'];

    public function mount()
    {
        $this->productsSelected = collect();
        $this->productsToSell = [];
    }
    public function addToCart($productId)
    {
        $cart = Cart::where('product_id', $productId)->first();
        if (!$cart) {
            Cart::create(['product_id' => $productId, 'qtd' => 1]);
        }else{
            $cart->update(['qtd' => $cart->qtd + 1]);
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

    public function render()
    {
        return view('livewire.p-o-s', ['products' => \App\Models\Product::where(function($query){
            $query->where('name', 'like', '%'.$this->search.'%')
                  ->orWhere('reference', 'like','%'.$this->search.'%');
        })->paginate(8)]);
    }
}
