<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminRoleAddComponent extends Component
{
    use AuthorizesRequests;

    public $name;
    public $permissionList;
    public $selected_permissions = [];

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|unique:roles,name',
            'selected_permissions' => 'required',
        ]);
    }

    public function addRole()
    {
        $this->authorize('role-create', 'admin-access');

        $this->validate([
            'name' => 'required|unique:roles,name',
            'selected_permissions' => 'required',
        ]);

        $permissions = Permission::whereIn('name', ['permission-create', 'permission-delete', 'permission-edit'])->pluck('id')->all();

        foreach ($this->selected_permissions as $p) {
            if (in_array($p, $permissions)  && !auth()->user()->can('super-admin')) {
                abort(403);
            }
        }

        $role = Role::create(['guard_name' => 'web', 'name' => $this->name]);

        foreach ($this->selected_permissions as $p) {
            $role->givePermissionTo($p);
        }

        session()->flash('message', 'Permission has been added successfully!');
    }

    public function render()
    {
        $this->authorize('role-create', 'admin-access');

        if (auth()->user()->can('super-admin')) {
            $permission = Permission::all();
        } else {
            $permission = Permission::whereNotIn('name', ['permission-create', 'permission-delete', 'permission-edit'])->get();
        }
        return view('livewire.admin.admin-role-add-component',['permission'=>$permission])->layout('layouts.dashboard');
    }
}
