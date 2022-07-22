<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class AdminRoleComponent extends Component
{
    use AuthorizesRequests;

    public function deleteRole($id)
    {
        $this->authorize('role-delete', 'admin-access');

        $role = Role::findorfail($id);
        if ($role->name == 'super-admin' && !auth()->user()->can('super-admin')) {
            abort(404);
        }
        $role->delete();
        session()->flash('del_message', 'Role has been deleted successfully');
        return redirect()->to(route('admin.role'));
    }

    public function render()
    {
        $this->authorize('role-show', 'admin-access');

        $roles = Role::orderBy('name', 'ASC')->get();
        $roleIds = $roles->pluck('id');

        $rolePermissions = DB::table('role_has_permissions')
            ->whereIn('role_has_permissions.role_id', $roleIds)
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->select('role_has_permissions.permission_id as pid', 'permissions.name as pname', 'role_has_permissions.role_id as rid')
            ->get();
        return view('livewire.admin.admin-role-component', ['roles' => $roles, 'rolePermissions' => $rolePermissions])->layout('layouts.dashboard');
    }
}
