<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Validation\Rule;
use App\Models\FooterInformation;
use Livewire\Component;

class AdminFooterInformationEditComponent extends Component
{
    public $info_id;
    public $name;
    public $link;
    public $type;

    public function mount($info_id)
    {
        $info = FooterInformation::find($info_id);
        $this->info_id = $info->id;
        $this->name    = $info->name;
        $this->link    = $info->link;
        $this->type    = $info->type;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => ['required','max:120', Rule::unique('footer_information')->ignore($this->info_id)],
            'link' => ['nullable'],
            'type' => ['required'],
        ]);
    }

    public function updateInfo()
    {
        if (!auth()->user()->can('footerinfo-edit', 'admin-access')) {
            abort(404);
        }

        $this->validate([
            'name' => ['required','max:120', Rule::unique('footer_information')->ignore($this->info_id)],
            'link' => ['nullable'],
            'type' => ['required'],
       ]);

        $info       = FooterInformation::find($this->info_id);
        $info->name = $this->name;
        $info->link = $this->link;
        $info->type = $this->type;
        $info->save();
        session()->flash('message',$this->name . ' has been updated successfully!');
    }

    public function render()
    {
        if (!auth()->user()->can('footerinfo-edit', 'admin-access')) {
            abort(404);
        }
        return view('livewire.admin.admin-footer-information-edit-component')->layout('layouts.dashboard');
    }
}
