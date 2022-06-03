<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        if (!auth()->user()->can('admin-access')) {
            abort(404);
        }
        return view('livewire.admin.admin-dashboard-component')->layout('layouts.dashboard');
    }
}
