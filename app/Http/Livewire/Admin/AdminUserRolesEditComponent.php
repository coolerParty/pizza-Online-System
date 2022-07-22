<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AdminUserRolesEditComponent extends Component
{
    use AuthorizesRequests;
    public $user_id;
    public $name;
    public $userRoles = [];

    public function mount($user_id)
    {
        $user = User::where('id', $user_id)->select('id', 'name')->first();
        $this->user_id = $user->id;
        $this->name = $user->name;

        $this->userRoles = DB::table('model_has_roles')
            ->where('model_has_roles.model_id', $this->user_id)
            ->pluck('model_has_roles.role_id')
            ->all();
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'userRoles' => 'required',
        ]);
    }

    public function updateUserRole()
    {
        $this->authorize('role-edit', 'admin-access');

        $this->validate([
            'userRoles' => 'required',
        ]);

        $roles = Role::whereIn('name', ['super-admin'])->pluck('id')->all();

        foreach ($this->userRoles as $p) {
            if (in_array($p, $roles)  && !auth()->user()->can('super-admin')) {
                abort(403);
            }
        }

        $user = User::where('id', $this->user_id)->first();

        $user->syncRoles($this->userRoles);

        session()->flash('message', 'Roles has been added successfully!');
    }

    public function render()
    {
        $this->authorize('role-edit', 'admin-access');

        if (auth()->user()->can('super-admin')) {
            $roles = Role::get();
        } else {
            $roles = Role::whereNotIn('name', ['super-admin'])->get();
        }

        return view('livewire.admin.admin-user-roles-edit-component', ['roles' => $roles])->layout('layouts.dashboard');
    }
}
