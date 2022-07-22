<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminProductComponent extends Component
{
    use AuthorizesRequests;

    public function deleteProduct($id)
    {
        $this->authorize('product-show', 'product-delete', 'admin-access');

        $product = Product::findorfail($id);
        if ($product) {
            $product->delete();
            session()->flash('del_message', 'Product has been deleted successfully');
            return redirect()->to(route('admin.product'));
        } else {
            session()->flash('del_message', 'No Product has been found!');
            return redirect()->to(route('admin.product'));
        }
    }

    public function updateFeature($product_id, $featured)
    {
        $this->authorize('product-show', 'product-edit', 'admin-access');

        $product = Product::find($product_id);
        $product->featured = $featured;
        $product->save();
        session()->flash('order_message', 'Product feature has been updated successfully to ' . $featured . '!');
        return redirect()->to(route('admin.product'));
    }

    public function updateStock($product_id, $stock_status)
    {
        $this->authorize('product-show', 'product-edit', 'admin-access');

        $product = Product::find($product_id);
        $product->stock_status = $stock_status;
        $product->save();
        session()->flash('order_message', 'Product stock has been updated successfully to ' . $stock_status . '!');
        return redirect()->to(route('admin.product'));
    }

    public function render()
    {
        $this->authorize('product-show', 'admin-access');

        $products = Product::select('id', 'name', 'stock_status', 'category_id', 'quantity', 'image', 'featured', 'created_at')->orderby('name', 'ASC')->get();
        return view('livewire.admin.admin-product-component', ['products' => $products])->layout('layouts.dashboard');
    }
}
