<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class AdminUserRolesComponent extends Component
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('role-show', 'admin-access');

        $users = User::select('id','name','email')->paginate(10);
        return view('livewire.admin.admin-user-roles-component', ['users'=>$users])->layout('layouts.dashboard');
    }
}
