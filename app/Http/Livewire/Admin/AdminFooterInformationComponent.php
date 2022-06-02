<?php

namespace App\Http\Livewire\Admin;

use App\Models\FooterInformation;
use Livewire\Component;

class AdminFooterInformationComponent extends Component
{
    public function deleteInfo($id)
    {
        $info = FooterInformation::findorfail($id);
        if($info)
        {
            $info->delete();
            session()->flash('message','Info has been deleted successfully');
            return redirect()->to(route('admin.info'));
        }
        else
        {
            session()->flash('message','No info has been found!');
            return redirect()->to(route('admin.info'));
        }

    }

    public function render()
    {
        $infos = FooterInformation::select('id','name','link','type')->get();
        return view('livewire.admin.admin-footer-information-component',['infos'=>$infos])->layout('layouts.dashboard');
    }
}
