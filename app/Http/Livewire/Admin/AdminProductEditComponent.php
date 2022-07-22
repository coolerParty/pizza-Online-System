<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;


class AdminProductEditComponent extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    public $product_id;
    public $name;
    public $short_description;
    public $description;
    public $regulary_price;
    public $sale_price;
    public $stock_status;
    public $category_id;
    public $quantity;
    public $featured;
    public $image;
    public $newimage;

    public function mount($product_id)
    {
        $product                 = Product::where('id',$product_id)->first();
        $this->product_id        = $product->id;
        $this->name              = $product->name;
        $this->short_description = $product->short_description;
        $this->description       = $product->description;
        $this->regulary_price    = $product->regulary_price;
        $this->sale_price        = $product->sale_price;
        $this->stock_status      = $product->stock_status;
        $this->category_id       = $product->category_id;
        $this->quantity          = $product->quantity;
        $this->featured          = $product->featured;
        $this->image             = $product->image;
    }

    public function updated($fields)
    {

        $this->validateOnly($fields,[
            'name'              => ['required','max:150', Rule::unique('products')->ignore($this->product_id)],
            'short_description' => ['required','max:200'],
            'description'       => ['required'],
            'regulary_price'    => ['required','numeric','between:0,5000.99'],
            'sale_price'        => ['nullable','numeric','between:0,5000.99'],
            'stock_status'      => ['required'],
            'category_id'       => ['required'],
            'quantity'          => ['required'],
            'featured'          => ['required'],

        ]);

        if($this->newimage)
        {
            $this->validateOnly($fields,['newimage' => 'required|mimes:jpeg,jpg,png|max:2000',]);
        }
    }

    public function updateProduct()
    {
        $this->authorize('product-edit', 'admin-access');

        $this->validate([
            'name'              => ['required','max:150', Rule::unique('products')->ignore($this->product_id)],
            'short_description' => ['required','max:200'],
            'description'       => ['required'],
            'regulary_price'    => ['required','numeric','between:0,5000.99'],
            'sale_price'        => ['nullable','numeric','between:0,5000.99'],
            'stock_status'      => ['required'],
            'category_id'       => ['required'],
            'quantity'          => ['required'],
            'featured'          => ['required'],
       ]);

       if($this->newimage)
        {
            $this->validate(['newimage' => 'required|mimes:jpeg,jpg,png|max:2000',]);
        }

        $product                    = Product::find($this->product_id);
        $product->name              = $this->name;
        $product->slug              = Str::slug($this->name);
        $product->short_description = $this->short_description;
        $product->description       = $this->description;
        $product->regulary_price    = $this->regulary_price;
        $product->sale_price        = $this->sale_price;
        $product->stock_status      = $this->stock_status;
        $product->category_id       = $this->category_id;
        $product->quantity          = $this->quantity;
        $product->featured          = $this->featured;

        if($this->newimage)
        {
            if($this->image)
            {
                unlink('assets/images/product'.'/'.$product->image); // Deleting Image
            }
            $imagename      = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $originalPath   = public_path().'/assets/images/product/';
            $thumbnailImage = Image::make($this->newimage);
            $thumbnailImage->fit(515,343);
            $thumbnailImage->save($originalPath.$imagename);
            $product->image = $imagename;
        }
        $product->save();
        session()->flash('message','Product has been updated successfully!');

    }

    public function render()
    {
        $this->authorize('product-edit', 'admin-access');

        $categories = Category::select('id','name')->orderby('name','ASC')->get();
        return view('livewire.admin.admin-product-edit-component',['categories'=>$categories])->layout('layouts.dashboard');
    }
}
