<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartProduct extends Component
{
    protected $listeners = ['updateCart' => 'render'];
    public function increaseQuantity($id)
    {
        $product = Cart::where('product_id', $id)->first();
        //avaliar quantidade do produto $qtd + 1

        $item = \App\Models\Product::where('id', $id)->first();
        if ($item->quantity > 0)
        {
            $item->quantity = $item->quantity - 1;
            $item->save();
            Cart::where('product_id',$id)->update(['qtd' => $product->qtd + 1]);
            $this->emit('updateCart');
        }else{
            $this->dispatchBrowserEvent('openStockAlert');
        }

        //$this->emit('increaseQuantity', $id);
    }
    public function decreaseQuantity($id)
    {
        $product = Cart::where('product_id', $id)->first();
        $item = \App\Models\Product::whereId($id)->first();

        $item->quantity = $item->quantity + 1;
        $item->save();
        //$this->showStockAlert = false;

        if ($product->qtd != 1)
        {
            Cart::where('product_id', $id)->update(['qtd' => $product->qtd - 1]);
        }else{
            Cart::where('product_id', $id)->delete();
        }
        $this->emit('updateCart');
    }

    public function removeProduct($productId, $qtd):void
    {
        Cart::where('product_id', $productId)->delete();
        $item = \App\Models\Product::whereId($productId)->first();
        $item->quantity = $item->quantity + $qtd;
        $item->save();

        $this->emit('updateCart');
    }
    public function render()
    {
        $countProducts = Cart::count();
        $cartItems = Cart::Join('products', 'products.id', '=', 'carts.product_id')
                            ->get()
                            ->map(function(Cart $items){
                                return (object) [
                                    'id' => $items->product_id,
                                    'name' => $items->name,
                                    'price' => $items->price,
                                    'qtd' => $items->qtd,
                                    'total' => ($items->qtd * $items->price),
                                ];
                            });
        $total = $cartItems->sum('total');
        return view('livewire.cart-product', compact('cartItems','countProducts', 'total'));
    }
}
