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
        Cart::where('product_id',$id)->update(['qtd' => $product->qtd + 1]);
        $this->emit('updateCart');
        //$this->emit('increaseQuantity', $id);
    }
    public function decreaseQuantity($id)
    {
        $product = Cart::where('product_id', $id)->first();
        if ($product->qtd != 1)
        {
            Cart::where('product_id', $id)->update(['qtd' => $product->qtd - 1]);
        }else{
            Cart::where('product_id', $id)->delete();
        }
        $this->emit('updateCart');
    }

    public function removeProduct($productId):void
    {
        Cart::where('product_id', $productId)->delete();
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
