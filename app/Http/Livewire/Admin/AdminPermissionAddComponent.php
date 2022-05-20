<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminPermissionAddComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-permission-add-component')->layout('layouts.dashboard');
    }
}
