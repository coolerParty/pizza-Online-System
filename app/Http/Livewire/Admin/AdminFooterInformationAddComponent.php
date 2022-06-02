<?php

namespace App\Http\Livewire\Admin;

use App\Models\FooterInformation;
use Livewire\Component;

class AdminFooterInformationAddComponent extends Component
{
    public $name;
    public $link;
    public $type;

    public function mount()
    {
        $this->link = '#';
        $this->type = null;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => ['required','max:120','unique:footer_information'],
            'link' => ['nullable'],
            'type' => ['required'],
        ]);
    }

    public function addInfo()
    {
        $this->validate([
            'name' => ['required','max:120','unique:footer_information'],
            'link' => ['nullable'],
            'type' => ['required'],
       ]);

        $info       = new FooterInformation();
        $info->name = $this->name;
        $info->link = $this->link;
        $info->type = $this->type;
        $info->save();
        session()->flash('message',$this->name . ' has been added successfully!');
    }


    public function render()
    {
        return view('livewire.admin.admin-footer-information-add-component')->layout('layouts.dashboard');
    }
}
