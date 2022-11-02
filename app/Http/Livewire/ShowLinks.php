<?php

namespace App\Http\Livewire;

use App\Models\Link;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLinks extends Component
{
    use WithPagination;

    protected $listeners = ['linkCreated' => 'render'];

    public function render()
    {
        return view('livewire.show-links',[
            'links' => Link::paginate(10),
        ]);
    }
}
