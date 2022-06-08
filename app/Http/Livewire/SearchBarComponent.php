<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchBarComponent extends Component
{
    public $search;

    public function mount()
    {
        $this->fill(request()->only('search'));
    }

    public function render()
    {
        return view('livewire.search-bar-component');
    }
}
