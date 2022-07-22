<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminCategoryAddComponent extends Component
{
    use AuthorizesRequests;

    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:categories',
        ]);
    }

    public function addCategory()
    {
        $this->authorize('category-create', 'admin-access');

        $this->validate([
            'name' => 'required|unique:categories',
       ]);

        $category       = new Category();
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->save();
        session()->flash('message','Category has been added successfully!');
    }

    public function render()
    {
        $this->authorize('category-create', 'admin-access');

        return view('livewire.admin.admin-category-add-component')->layout('layouts.dashboard');
    }
}
