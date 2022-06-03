<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;

class AdminContactComponent extends Component
{
    public function render()
    {
        if (!auth()->user()->can('contact-show', 'admin-access')) {
            abort(404);
        }

        $contacts = Contact::orderBy('created_at','DESC')->get();
        return view('livewire.admin.admin-contact-component',['contacts'=>$contacts])->layout('layouts.dashboard');
    }
}
