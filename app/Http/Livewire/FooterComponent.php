<?php

namespace App\Http\Livewire;

use App\Models\FooterInformation;
use Livewire\Component;

class FooterComponent extends Component
{
    public function render()
    {
        $infos = FooterInformation::select('id','name','link','type')->orderby('name','asc')->get();
        return view('livewire.footer-component',['infos'=>$infos]);
    }
}
