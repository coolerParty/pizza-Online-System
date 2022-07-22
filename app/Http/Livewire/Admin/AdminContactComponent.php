<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminContactComponent extends Component
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('contact-show', 'admin-access');

        $contacts = Contact::orderBy('created_at','DESC')->get();
        return view('livewire.admin.admin-contact-component',['contacts'=>$contacts])->layout('layouts.dashboard');
    }
}
