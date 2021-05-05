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
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Item increased']);
        $this->emitTo('cart-total', 'refreshComponent');
    }
    public function decrement($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty -1;
        Cart::update($rowId, $qty);
        $this->checkShipping();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Item descreased']);
        $this->emitTo('cart-total', 'refreshComponent');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Item has been deleted']);
        $this->emitTo('cart-total', 'refreshComponent');
    }
    public function destroyAll()
    {
        Cart::destroy();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'All items has been deleted!']);
        $this->emitTo('cart-total', 'refreshComponent');
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
