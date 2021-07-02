<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductCategory;

class HeaderSearchComponent extends Component
{
    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount()
    {
        $this->product_cat = 'All Categories';
        $this->fill(\request()->only('search', 'product_cat', 'product_cat_id'));
    }

    public function render()
    {
        $categories = $this->categories();
        return view('livewire.header-search-component', compact('categories'));
    }


    public function categories()
    {
        $cats = ProductCategory::where('is_active', 1)->orderBy('parent_id', 'asc')->orderBy('name', 'asc')->where('is_active',1)->get();
        $items=[];
        foreach ($cats as $c)
        {
            //$items[$c->parent_id][$c->id]=[$c->name, $c->slug];
            if($c->parent_id==0)
            {
                $items[$c->id][]=$c->name;
            }else{
                $items[$c->parent_id][$c->id][]=$c->name;
            }
        }
        //dd($items);
        return $items;
    }
}
