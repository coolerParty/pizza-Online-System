<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AdminHomeSliderEditComponent extends Component
{
    use WithFileUploads;
    public $homeslider_id;
    public $title;
    public $subtitle;
    public $short_description;
    public $status;
    public $product_id;
    public $image;
    public $newimage;

    public function mount($homeslider_id)
    {
        $slider                  = HomeSlider::find($homeslider_id);
        $this->homeslider_id     = $slider->id;
        $this->title             = $slider->title;
        $this->subtitle          = $slider->subtitle;
        $this->short_description = $slider->short_description;
        $this->status            = $slider->status;
        $this->product_id        = $slider->product_id;
        $this->image             = $slider->image;
    }

    public function updated($fields)
    {

        $this->validateOnly($fields, [
            'title'             => ['required', 'max:150', Rule::unique('home_sliders')->ignore($this->homeslider_id)],
            'subtitle'          => ['required', 'max:120'],
            'short_description' => ['required', 'max:200'],
            'status'            => ['required'],
            'product_id'        => ['required'],

        ]);

        if ($this->newimage) {
            $this->validateOnly($fields, ['newimage' => 'required|image|mimes:jpeg,jpg,png|max:2000',]);
        }
    }

    public function updateSlider()
    {

        if (!auth()->user()->can('homeslider-edit', 'admin-access')) {
            abort(404);
        }

        $this->validate([
            'title'             => ['required', 'max:150', Rule::unique('home_sliders')->ignore($this->homeslider_id)],
            'subtitle'          => ['required', 'max:120'],
            'short_description' => ['required', 'max:200'],
            'status'            => ['required'],
            'product_id'        => ['required'],
        ]);

        if ($this->newimage) {
            $this->validate(['newimage' => 'required|image|mimes:jpeg,jpg,png|max:2000',]);
        }

        $slider                    = HomeSlider::find($this->homeslider_id);
        $slider->title             = $this->title;
        $slider->subtitle          = $this->subtitle;
        $slider->short_description = $this->short_description;
        $slider->status            = $this->status;
        $slider->product_id        = $this->product_id;

        if ($this->newimage) {
            if ($this->image) {
                unlink('assets/images/slider' . '/' . $slider->image); // Deleting Image
            }
            $imagename      = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $originalPath   = public_path() . '/assets/images/slider/';
            $thumbnailImage = Image::make($this->newimage);
            $thumbnailImage->fit(607, 607);
            $thumbnailImage->save($originalPath . $imagename);
            $slider->image = $imagename;
        }
        $slider->save();
        session()->flash('message', 'Slider has been updated successfully!');
    }


    public function render()
    {
        if (!auth()->user()->can('homeslider-edit', 'admin-access')) {
            abort(404);
        }

        $products = Product::select('id','name')->orderBy('name','asc')->get();
        return view('livewire.admin.admin-home-slider-edit-component',['products'=>$products])->layout('layouts.dashboard');
    }
}
