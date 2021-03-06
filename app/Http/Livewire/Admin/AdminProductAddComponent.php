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

class AdminProductAddComponent extends Component
{
    use AuthorizesRequests;

    use WithFileUploads;
    public $name;
    public $short_description;
    public $description;
    public $regulary_price;
    public $sale_price;
    public $stock_status;
    public $category_id;
    public $quantity;
    public $image;
    public $featured;

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->category_id = '';
        $this->featured = false;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'              => ['required','max:120','unique:products'],
            'short_description' => ['required','max:200'],
            'description'       => ['required'],
            'regulary_price'    => ['required','numeric','between:0,5000.99'],
            'sale_price'        => ['nullable','numeric','between:0,5000.99'],
            'stock_status'      => ['required'],
            'category_id'       => ['required'],
            'quantity'          => ['required'],
            'image'             => ['required','mimes:jpeg,jpg,png','max:2000'],
            'featured'          => ['required'],
        ]);
    }

    public function addProduct()
    {
        $this->authorize('product-create', 'admin-access');

        $this->validate([
            'name'              => ['required','max:120','unique:products'],
            'short_description' => ['required','max:200'],
            'description'       => ['required'],
            'regulary_price'    => ['required','numeric','between:0,5000.99'],
            'sale_price'        => ['nullable','numeric','between:0,5000.99'],
            'stock_status'      => ['required'],
            'category_id'       => ['required'],
            'quantity'          => ['required'],
            'image'             => ['required','mimes:jpeg,jpg,png','max:2000'],
            'featured'          => ['required'],
       ]);

        $product                    = new Product();
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
        if($this->image)
        {
            $imagename = Carbon::now()->timestamp. '.' . $this->image->extension();

            $originalPath   = public_path().'/assets/images/product/';
            $thumbnailImage = Image::make($this->image);
            $thumbnailImage->fit(515,343);
            $thumbnailImage->save($originalPath.$imagename);

            $product->image = $imagename;
        }
        $product->save();
        session()->flash('message',$this->name . ' has been added successfully!');
    }

    public function render()
    {
        $this->authorize('product-create', 'admin-access');

        $categories = Category::select('id','name')->orderby('name','ASC')->get();
        return view('livewire.admin.admin-product-add-component',['categories'=>$categories])->layout('layouts.dashboard');
    }
}
