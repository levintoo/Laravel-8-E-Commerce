<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->with('success_message', 'Product Removed from cart');
    }
    public function destroyAll()
    {
        Cart::destroy();
        session()->flush('success_message','Cart cleared');
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
