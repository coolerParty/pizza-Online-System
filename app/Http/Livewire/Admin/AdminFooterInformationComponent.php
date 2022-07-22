<?php

namespace App\Http\Livewire\Admin;

use App\Models\FooterInformation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class AdminFooterInformationComponent extends Component
{
    use AuthorizesRequests;

    public function deleteInfo($id)
    {
        $this->authorize('footerinfo-show', 'footerinfo-delete', 'admin-access');

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
        $this->authorize('footerinfo-show', 'admin-access');

        $infos = FooterInformation::select('id','name','link','type')->get();
        return view('livewire.admin.admin-footer-information-component',['infos'=>$infos])->layout('layouts.dashboard');
    }
}
