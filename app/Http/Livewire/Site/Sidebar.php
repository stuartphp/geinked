<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\ProductCategory;

class Sidebar extends Component
{
    public $cat_main;
    public $cat_sub;

    public function mount()
    {
        $this->cat_main =request()->segment(2);
        $this->cat_sub =request()->segment(3);

    }
    public function render()
    {
        $cat = ProductCategory::orderBy('parent_id')->orderBy('name')->get();
        //dd($cat);
        foreach($cat as $a=>$b)
        {
            $k[$b->parent_id]=$b->name;
        }
        //dd($k);
        return view('livewire.site.sidebar', [
            'categories'=>$cat,
            'parents'=>$k
        ]);
    }

}
