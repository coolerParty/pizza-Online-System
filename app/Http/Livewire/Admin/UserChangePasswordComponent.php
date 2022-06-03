<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserChangePasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'current_password' => 'required',
            'password'         => 'required|min:8|confirmed|different:current_password',
        ]);
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'password'         => 'required|min:8|confirmed|different:current_password',
        ]);

        if(Hash::check($this->current_password,Auth::user()->password))
        {
            $user = User::findorFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            Session()->flash('password_success','Password has been changed successfully!');
        }
        else
        {
            Session()->flash('password_error','Password does not match!');
        }
    }

    public function render()
    {
        if (!auth()->user()->can('admin-access')) {
            abort(404);
        }
        return view('livewire.admin.user-change-password-component')->layout('layouts.dashboard');
    }
}
