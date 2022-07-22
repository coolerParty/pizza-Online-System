<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminCategoryComponent extends Component
{
    use AuthorizesRequests;

    public function deleteCategory($id)
    {

        $this->authorize('category-show', 'category-delete', 'admin-access');

        $category = Category::findorfail($id);
        if ($category) {
            $category->delete();
            session()->flash('del_message', 'Category has been deleted successfully');
            return redirect()->to(route('admin.category'));
        } else {
            session()->flash('del_message', 'No Category has been found!');
            return redirect()->to(route('admin.category'));
        }
    }

    public function render()
    {
        $this->authorize('category-show', 'admin-access');
        $categories = Category::select('id', 'name', 'created_at')->orderby('name', 'ASC')->get();
        return view('livewire.admin.admin-category-component', ['categories' => $categories])->layout('layouts.dashboard');
    }
}
