<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartTotal extends Component
{
    public $total;
    protected $listeners = ['refreshComponent'];

    public function mount()
    {
        if(Cart::count()>0){
            $this->total=Cart::count();
        }else{
            $this->total=0;
        }
    }

    public function refreshComponent()
    {
        $this->total=Cart::count();
    }
    
    public function render()
    {
        return view('livewire.cart-total');
    }
}
