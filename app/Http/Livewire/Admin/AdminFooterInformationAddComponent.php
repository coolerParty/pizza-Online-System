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
        if (!auth()->user()->can('footerinfo-create', 'admin-access')) {
            abort(404);
        }

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
        if (!auth()->user()->can('footerinfo-create', 'admin-access')) {
            abort(404);
        }

        return view('livewire.admin.admin-footer-information-add-component')->layout('layouts.dashboard');
    }
}
