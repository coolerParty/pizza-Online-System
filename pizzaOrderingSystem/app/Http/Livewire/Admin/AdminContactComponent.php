<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminContactComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-contact-component')->layout('layouts.dashboard');
    }
}
