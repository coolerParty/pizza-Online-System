<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Livewire\Component;

class AdminHomeSliderAddComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $short_description;
    public $status;
    public $product_id;
    public $image;

    public function mount()
    {
        $this->status = 0;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title'             => ['required', 'max:120', 'unique:home_sliders'],
            'subtitle'          => ['required', 'max:120'],
            'short_description' => ['required', 'max:200'],
            'status'            => ['required'],
            'product_id'        => ['required'],
            'image'             => ['required','image','mimes:jpeg,jpg,png|max:2000'],
        ]);
    }

    public function addSlider()
    {
        if (!auth()->user()->can('homeslider-create', 'admin-access')) {
            abort(404);
        }

        $this->validate([
            'title'             => ['required', 'max:120', 'unique:home_sliders'],
            'subtitle'          => ['required', 'max:120'],
            'short_description' => ['required', 'max:200'],
            'status'            => ['required'],
            'product_id'        => ['required'],
            'image'             => ['required','image','mimes:jpeg,jpg,png|max:2000'],
        ]);

        $slider                    = new HomeSlider();
        $slider->title             = $this->title;
        $slider->subtitle          = $this->subtitle;
        $slider->short_description = $this->short_description;
        $slider->status            = $this->status;
        $slider->product_id        = $this->product_id;

        if ($this->image) {
            $imagename = Carbon::now()->timestamp . '.' . $this->image->extension();

            $originalPath   = public_path() . '/assets/images/slider/';
            $thumbnailImage = Image::make($this->image);
            $thumbnailImage->fit(607, 607);
            $thumbnailImage->save($originalPath . $imagename);

            $slider->image = $imagename;
        }
        $slider->save();
        session()->flash('message', $this->title . ' has been added successfully!');
    }

    public function render()
    {
        if (!auth()->user()->can('homeslider-create', 'admin-access')) {
            abort(404);
        }
        $products = Product::select('id','name')->orderBy('name','asc')->get();
        return view('livewire.admin.admin-home-slider-add-component',['products'=>$products])->layout('layouts.dashboard');
    }
}
