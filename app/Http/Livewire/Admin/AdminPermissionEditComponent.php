<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminPermissionEditComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-permission-edit-component')->layout('layouts.dashboard');
    }
}
