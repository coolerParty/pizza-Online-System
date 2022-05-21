<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminUserRolesComponent extends Component
{
    public function render()
    {
        if (!auth()->user()->can('role-show', 'admin-access')) {
            abort(404);
        }

        $users = User::select('id','name','email')->paginate(10);
        return view('livewire.admin.admin-user-roles-component', ['users'=>$users])->layout('layouts.dashboard');
    }
}
