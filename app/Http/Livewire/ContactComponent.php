<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required|numeric',
            'comment' => 'required',
         ]);
    }

    public function sendMessage()
    {
        $this->validate([
           'name'    => 'required',
           'email'   => 'required|email',
           'phone'   => 'required|numeric',
           'comment' => 'required',
        ]);

        $contact          = new Contact();
        $contact->name    = $this->name;
        $contact->email   = $this->email;
        $contact->phone   = $this->phone;
        $contact->comment = $this->comment;
        $contact->save();
        session()->flash('message','Thanks, Your message has been sent successfully!.');
    }

    public function render()
    {
        return view('livewire.contact-component');
    }
}
