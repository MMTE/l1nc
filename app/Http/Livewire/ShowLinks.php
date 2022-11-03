<?php

namespace App\Http\Livewire;

use App\Models\Link;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLinks extends Component
{
    use WithPagination;

    protected $listeners = ['linkCreated' => 'render'];

    public $defaultDomain;

    public function mount(){
        $this->defaultDomain = env('APP_URL');
    }

    public function render()
    {
        return view('livewire.show-links',[
            'links' => Link::latest()->paginate(10),
        ]);
    }
}
