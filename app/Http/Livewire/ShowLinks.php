<?php

namespace App\Http\Livewire;

use App\Models\Link;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLinks extends Component
{
    use WithPagination;

    protected $listeners = ['linkCreated' => 'render'];

    public $defaultDomain;

    public function mount()
    {
        $this->defaultDomain = env('APP_URL');
    }

    public function render()
    {
        $user = Auth::user();
        $team = $user->currentTeam;

        return view('livewire.show-links', [
            'links' => Link::where('team_id', $team->id)->where('user_id', $user->id)->latest()->paginate(10),
        ]);
    }
}
