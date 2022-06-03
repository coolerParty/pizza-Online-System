<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\models\Category;

class AdminCategoryComponent extends Component
{
    public function deleteCategory($id)
    {
        if (!auth()->user()->can('category-show','category-delete', 'admin-access')) {
            abort(404);
        }

        $category = Category::findorfail($id);
        if($category)
        {
            $category->delete();
            session()->flash('del_message','Category has been deleted successfully');
            return redirect()->to(route('admin.category'));
        }
        else
        {
            session()->flash('del_message','No Category has been found!');
            return redirect()->to(route('admin.category'));
        }

    }

    public function render()
    {
        if (!auth()->user()->can('category-show', 'admin-access')) {
            abort(404);
        }
        $categories = Category::select('id','name','created_at')->orderby('name','ASC')->get();
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.dashboard');
    }
}
