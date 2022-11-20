<?php

namespace App\Http\Livewire;

use App\Models\Link;
use Livewire\Component;

class HomepageShowLinks extends Component
{
    protected $listeners = ['linkCreated' => 'render'];

    public function render()
    {
        $links = session()->has('unAuthenticatedLinks') ? session()->get('unAuthenticatedLinks') : [];

        return view('livewire.homepage-show-links', [
            'links' => array_reverse($links),
            'random' => random_int(1,10)
        ]);
    }

}
