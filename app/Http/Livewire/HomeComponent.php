<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{
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
        $products = Product::select('id','name','regulary_price','short_description','image','slug')->orderby('created_at','ASC')->limit(8)->get();
        $witems = Cart::instance('wishlist')->content()->pluck('id');

        if(Auth::check())
        {
            Cart::instance('cart')->restore(Auth::user()->email); // save cart to database using user email;
            Cart::instance('wishlist')->restore(Auth::user()->email); // save wishlist to database using user email;
        }

        return view('livewire.home-component',['products'=>$products,'witems'=>$witems])->layout('layouts.base');
    }
}
