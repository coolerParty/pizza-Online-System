<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Review;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetailsComponent extends Component
{

    public $product_id;
    public $name;
    public $slug;
    public $short_description;
    public $stock_status;
    public $regular_price;
    public $category_id;
    public $quantity;
    public $image;

    public function mount($product_id, $slug)
    {
        $this->product_id = $product_id;
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent'); // refresh cart count display top right menu
        session()->flash('cart_message','"'.$product_name . '" has been added to cart!');
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent'); // refresh wishlist count display top right menu
    }

    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent'); // refresh wishlist count display top right menu
                return;
            }
        }
    }

    public function render()
    {
        $product = Product::select('id', 'name', 'slug', 'short_description', 'description','stock_status', 'regulary_price', 'category_id', 'quantity', 'image')
            ->where('id', $this->product_id)
            ->first();

        if (!$product && $product->slug != $this->slug) {
            abort(404);
        }
        $witems = Cart::instance('wishlist')->content()->pluck('id');

        if (Auth::check()) {
            Cart::instance('cart')->restore(Auth::user()->email); // save cart to database using user email;
            Cart::instance('wishlist')->restore(Auth::user()->email); // save wishlist to database using user email;
        }
        return view('livewire.product-details-component', ['product' => $product, 'witems' => $witems])->layout('layouts.base');
    }
}
