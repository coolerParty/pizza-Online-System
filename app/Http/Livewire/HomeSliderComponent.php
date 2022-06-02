<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use Livewire\Component;

class HomeSliderComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::select('id','title','subtitle','short_description','image','product_id')->get();
        return view('livewire.home-slider-component',['sliders'=>$sliders]);
    }
}
