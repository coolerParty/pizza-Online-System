<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class AdminProductComponent extends Component
{
    public function deleteProduct($id)
    {
        $product = Product::findorfail($id);
        if($product)
        {
            $product->delete();
            session()->flash('del_message','Product has been deleted successfully');
            return redirect()->to(route('admin.product'));
        }
        else
        {
            session()->flash('del_message','No Product has been found!');
            return redirect()->to(route('admin.product'));
        }
        
    }

    public function render()
    {
        $products = Product::select('id','name','stock_status','category_id','quantity','image','created_at')->orderby('name','ASC')->get();
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.dashboard');
    }
}
