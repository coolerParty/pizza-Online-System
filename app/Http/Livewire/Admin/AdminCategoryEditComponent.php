<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminCategoryEditComponent extends Component
{
    use AuthorizesRequests;
    public $category_id;
    public $name;

    public function mount($category_id)
    {
        $category = Category::where('id',$category_id)->first();
        if($category)
        {
            $this->category_id = $category->id;
            $this->name        = $category->name;
        }
        else
        {
            session()->flash('message','No Category has been found!');
            return redirect()->to(route('admin.category'));
        }

    }

    public function updated($fields)
    {

        $this->validateOnly($fields,[
            'name' => ['required', Rule::unique('categories')->ignore($this->category_id)],
        ]);

    }

    public function updateCategory()
    {
        $this->authorize('category-edit', 'admin-access');

        $this->validate([
            'name' => ['required', Rule::unique('categories')->ignore($this->category_id)],
        ]);

        $category       = Category::find($this->category_id)->first();
        $category->name = $this->name;
        $category->slug = Str::slug($this->name);
        $category->save();
        session()->flash('message','Category has been Updated Successfully!');

    }

    public function render()
    {
        $this->authorize('category-edit', 'admin-access');
        return view('livewire.admin.admin-category-edit-component')->layout('layouts.dashboard');
    }
}
