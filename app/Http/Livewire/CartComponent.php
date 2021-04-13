<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{

    public $shipping = 'To be calculated';

    public function increment($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty +1;
        Cart::update($rowId, $qty);
        $this->checkShipping();
    }
    public function decrement($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty -1;
        Cart::update($rowId, $qty);
        $this->checkShipping();
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success', 'Item has been removed');
    }

    public function mount(){
        $this->checkShipping();
    }

    public function render()
    {
        return view('livewire.cart-component');
    }

    public function checkShipping()
    {
        $total = str_replace(',', '', Cart::total());
        if($total>2000)
        {
            $this->shipping='Free Shipping';
        }else{
            $this->shipping='To be calculated';
        }
    }

}
