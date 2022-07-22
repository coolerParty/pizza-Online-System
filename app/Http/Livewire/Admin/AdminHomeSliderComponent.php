<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    use AuthorizesRequests;

    public function deleteSlider($id)
    {
        $this->authorize('homeslider-show', 'homeslider-delete',  'admin-access');

        $slider = HomeSlider::findorfail($id);
        if ($slider) {
            if ($slider->image) {
                unlink('assets/images/slider' . '/' . $slider->image); // Deleting Image
            }
            $slider->delete();
            session()->flash('del_message', 'Slider has been deleted successfully');
            return redirect()->to(route('admin.homeslider'));
        } else {
            session()->flash('del_message', 'No Product has been found!');
            return redirect()->to(route('admin.homeslider'));
        }
    }

    public function updateStatus($homeslider_id, $status)
    {
        $this->authorize('homeslider-show', 'homeslider-edit',  'admin-access');

        $Slider = HomeSlider::find($homeslider_id);
        $Slider->status = $status;
        $Slider->save();
        session()->flash('up_message', 'Slide feature has been updated successfully to ' . $status . '!');
        return redirect()->to(route('admin.homeslider'));
    }

    public function render()
    {
        $this->authorize('homeslider-show', 'admin-access');

        $sliders = HomeSlider::select('id', 'title', 'subtitle', 'short_description', 'status', 'image', 'product_id', 'created_at')->get();
        return view('livewire.admin.admin-home-slider-component', ['sliders' => $sliders])->layout('layouts.dashboard');
    }
}
