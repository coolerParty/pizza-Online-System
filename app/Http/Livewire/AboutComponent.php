<?php

namespace App\Http\Livewire;

use App\Models\About;
use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        $about = About::select('title','body')->first();
        return view('livewire.about-component',['about'=>$about]);
    }
}
