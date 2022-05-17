<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class WishlistComponent extends Component
{
    public function moveMenuFromWishlistToCart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('wishlist_message','Item has been moved to cart!');
    }

    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                session()->flash('wishlist_message','Item has been removed!');
                $this->emitTo('wishlist-count-component','refreshComponent'); // refresh wishlist count display top right menu
                return;
            }
        }
    }

    public function destroyAll()
    {
        Cart::instance('wishlist')->destroy();
        session()->flash('wishlist_message','All Item has been removed!');
        $this->emitTo('wishlist-count-component','refreshComponent'); // refresh wishlist count display top right menu
    }

    public function render()
    {
        if(Auth::Check())
        {
            Cart::instance('wishlist')->store(Auth::user()->email); // save wishlist to database using user email;
        }

        return view('livewire.wishlist-component')->layout('layouts.base');
    }
}
