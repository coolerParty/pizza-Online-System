<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;

class AdminContactComponent extends Component
{
    public function render()
    {
        $contacts = Contact::orderBy('created-at','DESC')->get();
        return view('livewire.admin.admin-contact-component',['contacts'=>$contacts])->layout('layouts.dashboard');
    }
}
