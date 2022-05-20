<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class AdminPermissionAddComponent extends Component
{
    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|unique:permissions,name',
        ]);
    }

    public function addPermission()
    {
        if (!auth()->user()->can('permission-create', 'admin-access')) {
            abort(404);
        }

        $this->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['guard_name' => 'web', 'name' => $this->name]);

        session()->flash('message', 'Permission has been added successfully!');
    }

    public function render()
    {

        if (!auth()->user()->can('permission-create', 'admin-access')) {
            abort(404);
        }

        return view('livewire.admin.admin-permission-add-component')->layout('layouts.dashboard');
    }
}
