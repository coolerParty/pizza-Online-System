<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminCategoryAddComponent extends Component
{
    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:categories',
        ]);
    }

    public function addCategory()
    {
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
        return view('livewire.admin.admin-category-add-component')->layout('layouts.dashboard');
    }
}
