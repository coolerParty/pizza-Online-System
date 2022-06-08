<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use DB;
use Cart;


class SearchComponent extends Component
{
    public $PAGE_NUMBER_LIMIT = 15;

    public $search;

    public function mount()
    {
        $this->fill(request()->only('search'));
    }

    public function render()
    {
        $products = Product::select('id', 'name', 'regulary_price', 'image', 'slug', 'category_id')->where('name', 'like', '%' . $this->search . '%')->where('stock_status', 'instock')->orderby('created_at', 'ASC')->get();
        $witems = Cart::instance('wishlist')->content()->pluck('id');
        return view('livewire.search-component', ['products' => $products, 'witems' => $witems])->layout('layouts.base');
    }
}
