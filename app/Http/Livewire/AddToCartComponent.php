<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class AddToCartComponent extends Component
{
    public $name;
    public $pid;
    public $price;

    public function mount($name, $id, $price)
    {
        $this->name=$name;
        $this->pid = $id;
        $this->price=$price;

    }
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success', 'Item added to Cart');
        return redirect()->route('cart');
    }

    public function render()
    {
        return view('livewire.add-to-cart-component');
    }
}
