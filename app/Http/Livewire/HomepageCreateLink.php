<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use App\Models\Link;
use App\Repositories\DomainRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomepageCreateLink extends Component
{
    public $link;

    public function render()
    {
        return view('livewire.homepage-create-link');
    }

    public function submit()
    {

        $domain = null;

        $user = Auth::user();

        $team = null;

        $team = null;

        $link = (new DomainRepository())->createLink($domain, $user, $team, $this->link, null);

        $unAuthenticatedLinks = session()->has('unAuthenticatedLinks') ? session()->get('unAuthenticatedLinks') : [];

        $unAuthenticatedLinks[] = $link;

        session()->put('unAuthenticatedLinks', $unAuthenticatedLinks);

        $this->emit('linkCreated');

        session()->flash('message', 'Link Created Successfully');

        $this->link = '';
    }

}
