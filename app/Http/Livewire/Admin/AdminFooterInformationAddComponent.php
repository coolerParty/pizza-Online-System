<?php

namespace App\Http\Livewire\Admin;

use App\Models\FooterInformation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class AdminFooterInformationAddComponent extends Component
{
    use AuthorizesRequests;

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
        $this->authorize('footerinfo-create', 'admin-access');

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
        $this->authorize('footerinfo-create', 'admin-access');

        return view('livewire.admin.admin-footer-information-add-component')->layout('layouts.dashboard');
    }
}
