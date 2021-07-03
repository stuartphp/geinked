<?php

namespace App\Http\Livewire;

use App\Models\ProductCategory;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use Illuminate\Support\Facades\DB;

class ShopComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $size=12;
    public $category_title='All Products';
    public $parent_title;
    public $parent_slug;
    public $category_slug='';
    public $category_id;
    public $category;
    public $category_image='shop-banner.jpg';
    public $category_parent_id;

    protected $paginationTheme = 'bootstrap';

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Item has been added']);
        $this->emitTo('cart-total', 'refreshComponent');
    }

    public function mount()
    {
        $parent = request()->segment(2);
        $child = request()->segment(3);
        if($child != NULL){
            $res = $this->getCategory($child);
            $this->category_title = $res->name;
            $this->category = 'category_id';
            $this->category_id=$res->id;
        }else if($parent != NULL){
            $res = $this->getCategory($parent);
            $this->category_title = $res->name;
            $this->category = 'category_parent_id';
            $this->category_id=$res->id;
        }else{
            //dd('all');
        }

    }

    public function getCategory($slug)
    {
        $res = ProductCategory::where('slug', $slug)->first();
        if($res->image == NULL )
        {
            $img = ProductCategory::where('id', $res->parent_id)->first();
            $this->category_image=$img->image;
        }else{
            $this->category_image=$res->image;
        }
        return $res;
    }

    public function render()
    {
/*
        switch($this->sorting)
        {
            case 'date':
                if($this->category_id>0)
                {
                    $products=Product::where('category_id', $this->category_id)->orderBy('updated_at', 'desc')->paginate($this->size);
                }else{
                    $products=Product::orderBy('updated_at', 'desc')->paginate($this->size);
                }
                break;
            case 'price':
                if($this->category_id>0)
                {
                    $products=Product::where('category_id', $this->category_id)->orderBy('regular_price', 'asc')->paginate($this->size);
                }else{
                    $products=Product::orderBy('regular_price', 'asc')->paginate($this->size);
                }
                break;
            case 'price-desc':
                if($this->category_id>0)
                {
                    $products=Product::where('category_id', $this->category_id)->orderBy('regular_price', 'desc')->paginate($this->size);
                }else{
                    $products=Product::orderBy('regular_price', 'desc')->paginate($this->size);
                }
                break;
            default:
            if($this->category_id>0)
                {
                    $products=Product::where('category_id', $this->category_id)->paginate($this->size);
                }else{
                    $products=Product::paginate($this->size);
                }
                break;
        }*/
        $products = Product::with(['options'])
            ->when($this->category, function($q){
                $q->where($this->category, $this->category_id);
            })
            ->paginate($this->size);
        return view('livewire.shop-component', compact('products'));
    }

    public function sortBy($field)
    {

    }

    public function query()
    {
        return Product::query();
    }

}
