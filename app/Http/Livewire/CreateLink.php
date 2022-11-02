<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateLink extends Component
{

    public $link;

    public function render()
    {
        return view('livewire.create-link');
    }

    public function submit()
    {
        session()->flash('message', 'Post successfully updated.');

        $link = 'hi';
    }

}
