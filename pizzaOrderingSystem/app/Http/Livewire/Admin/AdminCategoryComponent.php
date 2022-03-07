<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\models\Category;

class AdminCategoryComponent extends Component
{
    public function deleteCategory($id)
    {
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
        $categories = Category::select('id','name','created_at')->orderby('name','ASC')->get();
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.dashboard');
    }
}
