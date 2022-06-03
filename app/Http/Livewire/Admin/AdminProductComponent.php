<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class AdminProductComponent extends Component
{
    public function deleteProduct($id)
    {
        if (!auth()->user()->can('product-show','product-delete', 'admin-access')) {
            abort(404);
        }

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

    public function updateFeature($product_id, $featured)
    {
        if (!auth()->user()->can('product-show', 'product-edit','admin-access')) {
            abort(404);
        }

        $product = Product::find($product_id);
        $product->featured = $featured;
        $product->save();
        session()->flash('order_message','Product feature has been updated successfully to '. $featured . '!');
        return redirect()->to(route('admin.product'));
    }

    public function render()
    {
        if (!auth()->user()->can('product-show', 'admin-access')) {
            abort(404);
        }

        $products = Product::select('id','name','stock_status','category_id','quantity','image','featured','created_at')->orderby('name','ASC')->get();
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.dashboard');
    }
}
