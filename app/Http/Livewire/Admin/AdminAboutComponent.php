<?php

namespace App\Http\Livewire\Admin;

use App\Models\About;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AdminAboutComponent extends Component
{
    public $title;
    public $body;
    public $about_id;

    public function mount()
    {
        $about = About::select('id','title','body')->first();
        if(empty($about))
        {
            $a        = new About();
            $a->title = 'Best Food In The Country';
            $a->body  = '<p>Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Dolore, Sequi Corrupti Corporis Quaerat Voluptatem Ipsam Neque Labore Modi Autem, Saepe Numquam Quod Reprehenderit Rem? Tempora Aut Soluta Odio Corporis Nihil!</p>
                        <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Aperiam, Nemo. Sit Porro Illo Eos Cumque Deleniti Iste Alias, Eum Natus.</p>';
            $a->save();
            return redirect()->to(route('admin.about'));
        }
        $this->about_id = $about->id;
        $this->title    = $about->title;
        $this->body     = $about->body;

    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => ['required','max:150', Rule::unique('abouts')->ignore($this->about_id)],
            'body'  => ['required'],
        ]);
    }

    public function update()
    {
        if (!auth()->user()->can('about-show', 'about-edit', 'admin-access')) {
            abort(404);
        }

        $this->validate([
            'title' => ['required','max:150', Rule::unique('abouts')->ignore($this->about_id)],
            'body'  => ['required'],
       ]);

       $about        = About::where('id',$this->about_id)->first();
       $about->title = $this->title;
       $about->body  = $this->body;
       $about->save();
       session()->flash('message','About has been updated successfully!');
    }

    public function render()
    {
        if (!auth()->user()->can('about-show', 'about-edit', 'admin-access')) {
            abort(404);
        }

        return view('livewire.admin.admin-about-component')->layout('layouts.dashboard');
    }
}
