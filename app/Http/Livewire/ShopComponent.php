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

    protected $paginationTheme = 'bootstrap';

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success', 'Item added to Cart');
        return redirect()->route('cart');
    }

    public function mount()
    {
        $this->sorting='default';
        $this->size=12;
    }

    public function render()
    {
        switch($this->sorting)
        {
            case 'date':
                $products=Product::orderBy('updated_at', 'desc')->paginate($this->size);
                break;
            case 'price':
                $products=Product::orderBy('regular_price', 'asc')->paginate($this->size);
                break;
            case 'price-desc':
                $products=Product::orderBy('regular_price', 'desc')->paginate($this->size);
                break;
            default:
                $products=Product::paginate($this->size);
                break;

        }

        $categories = $this->categories();
        return view('livewire.shop-component', compact('products', 'categories'));
    }

    public function categories()
    {
        $list=[];
        $cats = Category::where('is_active', 1)->orderBy('main', 'asc')->orderBy('sub', 'asc')->get();
        foreach($cats as $cat)
        {
            $list[$cat->main][]=$cat->sub;
        }
        return $list;
    }
}
