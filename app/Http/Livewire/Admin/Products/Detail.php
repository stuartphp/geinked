<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductUnit;
use Illuminate\Support\Str;

class Detail extends Component
{
    public $stage;

    public function mount($id)
    {
        $this->stage = Product::findOrFail($id)->toArray();
    }

    public function render()
    {
        return view('livewire.admin.products.detail',
            [
                'categories'=>$this->getCategories(),
                'units' =>$this->getUnits()
            ]
        );
    }

    public function updated($name, $value)
    {
        if($name == 'stage.name')
        {
            $this->stage['slug']=Str::slug($value);
        }
    }

    public function getUnits()
    {
        return ProductUnit::orderBy('name')->pluck('name', 'id')->toArray();
    }

    public function getCategories()
    {
        return ProductCategory::orderBy('parent_id')->orderBy('name')->where('is_active', 1)->get();
    }
}
