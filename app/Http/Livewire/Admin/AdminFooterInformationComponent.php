<?php

namespace App\Http\Livewire\Admin;

use App\Models\FooterInformation;
use Livewire\Component;

class AdminFooterInformationComponent extends Component
{
    public function deleteInfo($id)
    {
        if (!auth()->user()->can('footerinfo-show', 'footerinfo-delete','admin-access')) {
            abort(404);
        }
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
        if (!auth()->user()->can('footerinfo-show', 'admin-access')) {
            abort(404);
        }

        $infos = FooterInformation::select('id','name','link','type')->get();
        return view('livewire.admin.admin-footer-information-component',['infos'=>$infos])->layout('layouts.dashboard');
    }
}
