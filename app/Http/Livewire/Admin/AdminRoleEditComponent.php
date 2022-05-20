<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class AdminRoleEditComponent extends Component
{
    public $role_id;
    public $name;
    public $selected_permissions = [];

    public function mount($role_id)
    {
        $role = Role::find($role_id);
        if (empty($role)) {
            abort(404);
        }

        $this->role_id = $role->id;
        $this->name = $role->name;
        $this->selected_permissions = json_decode($role->permissions->pluck('id'));
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => ['required', Rule::unique('roles')->ignore($this->role_id)],
            'selected_permissions' => 'required',
        ]);
    }

    public function checkSelected()
    {
        dd($this->selected_permissions);
    }

    public function addRole()
    {
        if (!auth()->user()->can('role-edit', 'admin-access')) {
            abort(404);
        }

        $this->validate([
            'name' => ['required', Rule::unique('roles')->ignore($this->role_id)],
            'selected_permissions' => 'required',
        ]);

        $permissions = Permission::whereIn('name', ['permission-create', 'permission-delete', 'permission-edit'])->pluck('id')->all();

        foreach ($this->selected_permissions as $p) {
            if (in_array($p, $permissions)  && !auth()->user()->can('super-admin')) {
                abort(403);
            }
        }

        $role = Role::find($this->role_id);
        $role->name = $this->name;
        $role->save();

        $role->syncPermissions($this->selected_permissions);

        session()->flash('message', 'Roles has been added successfully!');

    }

    public function render()
    {
        if (!auth()->user()->can('role-edit', 'admin-access')) {
            abort(404);
        }


        if (auth()->user()->can('super-admin')) {
            $permissions = Permission::all();
        } else {
            $permissions = Permission::whereNotIn('name', ['permission-create', 'permission-delete', 'permission-edit'])->get();
        }

        $rolePermissions = DB::table('role_has_permissions')
        ->where('role_has_permissions.role_id', $this->role_id)
        ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
        ->all();

        return view('livewire.admin.admin-role-edit-component', ['permissions' => $permissions, 'rolePermissions'=>$rolePermissions])->layout('layouts.dashboard');
    }
}
