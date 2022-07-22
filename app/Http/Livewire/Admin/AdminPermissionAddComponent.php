<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class AdminPermissionAddComponent extends Component
{
    use AuthorizesRequests;
    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|unique:permissions,name',
        ]);
    }

    public function addPermission()
    {
        $this->authorize('permission-create', 'admin-access');

        $this->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['guard_name' => 'web', 'name' => $this->name]);

        session()->flash('message', 'Permission has been added successfully!');
    }

    public function render()
    {
        $this->authorize('permission-create', 'admin-access');

        return view('livewire.admin.admin-permission-add-component')->layout('layouts.dashboard');
    }
}
