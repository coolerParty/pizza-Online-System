<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlider($id)
    {
        $slider = HomeSlider::findorfail($id);
        if($slider)
        {
            if($slider->image)
            {
                unlink('assets/images/slider'.'/'.$slider->image); // Deleting Image
            }
            $slider->delete();
            session()->flash('del_message','Slider has been deleted successfully');
            return redirect()->to(route('admin.homeslider'));
        }
        else
        {
            session()->flash('del_message','No Product has been found!');
            return redirect()->to(route('admin.homeslider'));
        }

    }

    public function updateStatus($homeslider_id, $status)
    {
        $Slider = HomeSlider::find($homeslider_id);
        $Slider->status = $status;
        $Slider->save();
        session()->flash('up_message','Slide feature has been updated successfully to '. $status . '!');
        return redirect()->to(route('admin.homeslider'));
    }

    public function render()
    {
        $sliders = HomeSlider::select('id','title','subtitle','short_description','status','image','product_id','created_at')->get();
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.dashboard');
    }
}
