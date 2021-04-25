<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $size;
    public $category_title;
    public $category_slug='';
    public $category_id=0;
    public $category_image='shop-banner.jpg';
    public $category_parent_id=0;
    public $listeners = ['updCategory'];

    protected $paginationTheme = 'bootstrap';

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success', 'Item added to Cart');
        return redirect()->route('cart');
    }

    public function updCategory($cat)
    {
        $c = Category::where('slug', $cat)->first();
        $this->category_slug=$cat;
        $this->category_id=$c->id;
        $this->category_parent_id=$c->parent_id;
        $this->category_title = $c->name;
        if($c->image != NULL)
        {
            $this->category_image = $c->image;
        }
    }

    public function mount($cat='', $slug='')
    {
        if($cat>'')
        {
            $this->category_slug=$cat;
            $c = Category::where('slug', $cat)->first();
            $this->category_id=$c->id;
            $this->category_parent_id=$c->parent_id;
            $this->category_title = $c->name;
            if($c->image != NULL)
            {
                $this->category_image = $c->image;
            }
        }else{
            $this->category_title='All Products';
        }
        $this->sorting='default';
        $this->size=12;
    }


    public function render()
    {

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
        }

        $categories = $this->categories();
        return view('livewire.shop-component', compact('products', 'categories'));
    }

    public function categories()
    {
        $cats = Category::where('is_active', 1)->orderBy('parent_id', 'asc')->orderBy('name', 'asc')->where('is_active',1)->get();
        $items=[];
        foreach ($cats as $c)
        {
            $items[$c->parent_id][$c->id]=[$c->name, $c->slug];
        }
        return $items;
    }

}
