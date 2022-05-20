<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class AdminPermissionComponent extends Component
{
    public function deletePermission($id)
    {

        if (!auth()->user()->can('permission-delete', 'admin-access')) {
            abort(404);
        }

        $permission = Permission::findorfail($id);
        if ($permission) {
            $permission->delete();
            session()->flash('del_message', 'Permission has been deleted successfully');
            return redirect()->to(route('admin.permission'));
        } else {
            session()->flash('del_message', 'No Category has been found!');
            return redirect()->to(route('admin.permission'));
        }

    }

    public function render()
    {

        if (!auth()->user()->can('permission-show', 'admin-access')) {
            abort(404);
        }

        if (auth()->user()->can('super-admin')) {
            $permissions = Permission::orderBy('name', 'ASC')->get();
        } else {
            $permissions = Permission::whereNotIn('name', ['permission-create', 'permission-delete', 'permission-edit'])->orderBy('name', 'ASC')->get();
        }
        return view('livewire.admin.admin-permission-component', ['permissions' => $permissions])->layout('layouts.dashboard');
    }

}
