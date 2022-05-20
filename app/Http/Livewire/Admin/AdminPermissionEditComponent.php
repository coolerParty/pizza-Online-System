<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class AdminPermissionEditComponent extends Component
{
    public $permission_id;
    public $name;

    public function mount($permission_id)
    {

        $permission = Permission::find($permission_id);
        if (empty($permission)) {
            abort(404);
        }
        if (!auth()->user()->can('super-admin')) {

            if (in_array($permission->name, ['permission-create', 'permission-delete', 'permission-edit'])) {
                abort(404);
            }
        }
        $this->permission_id = $permission->id;
        $this->name = $permission->name;
    }
    public function updated($fields)
    {

        $this->validateOnly($fields, [
            'name' => ['required', Rule::unique('permissions')->ignore($this->permission_id)],
        ]);
    }

    public function updatePermission()
    {
        if (!auth()->user()->can('permission-edit', 'admin-access')) {
            abort(404);
        }

        $this->validate([
            'name' => ['required', Rule::unique('permissions')->ignore($this->permission_id)],
        ]);

        $permission = Permission::find($this->permission_id);
        if (!auth()->user()->can('super-admin')) {

            if (in_array($permission->name, ['permission-create', 'permission-delete', 'permission-edit'])) {
                abort(404);
            }
        }

        $permission->name = $this->name;
        $permission->save();

        session()->flash('message', 'Permission has been Updated Successfully!');
    }
    public function render()
    {
        if (!auth()->user()->can('permission-edit', 'admin-access')) {
            abort(404);
        }
        return view('livewire.admin.admin-permission-edit-component')->layout('layouts.dashboard');
    }
}
