<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class AdminPermissionComponent extends Component
{
    use AuthorizesRequests;

    public function deletePermission($id)
    {
        $this->authorize('permission-show', 'permission-delete', 'admin-access');

        if (auth()->user()->can('super-admin')) {
            $permission = Permission::findorfail($id);
        } else {
            $permission = Permission::findorfail($id)->whereNotIn('name', ['permission-create', 'permission-delete', 'permission-edit']);
        }

        $permission->delete();
        session()->flash('del_message', 'Permission has been deleted successfully');
        return redirect()->to(route('admin.permission'));
    }

    public function render()
    {
        $this->authorize('permission-show', 'admin-access');

        if (auth()->user()->can('super-admin')) {
            $permissions = Permission::orderBy('name', 'ASC')->get();
        } else {
            $permissions = Permission::whereNotIn('name', ['permission-create', 'permission-delete', 'permission-edit'])->orderBy('name', 'ASC')->get();
        }

        return view('livewire.admin.admin-permission-component', ['permissions' => $permissions])->layout('layouts.dashboard');
    }
}
