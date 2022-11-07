<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use App\Models\Link;
use App\Repositories\DomainRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Laravel\Jetstream\Features;
use Livewire\Component;

class CreateLink extends Component
{

    public $link;
    public $protocol = 'https';
    public $domain = null;
    public $customUrl = null;

    public function render()
    {
        return view('livewire.create-link', [
            'domains' => Domain::all()
        ]);
    }

    public function updatingCustomUrl($value)
    {
        $this->resetValidation('customUrl');
        $this->resetErrorBag('customUrl');
    }

    public function updatedCustomUrl($value)
    {
        $domain = Domain::where('domain', $this->domain)->first();
        $link = Link::where('domain_id', $domain?->id)->where('url', $value)->first();
        if ($link) {
            $this->addError('customUrl', 'This URL is not available to use!');
        } else {
        }
    }

    public function submit()
    {
        $domain = Domain::where('domain', $this->domain)->first();

        $link = Link::where('domain_id', $domain?->id)->where('url', $this->customUrl ?: $this->link
        )->first();

        if ($link) {
            return $this->addError('duplicate', 'this url is not available. already used.');
        }

        $user = Auth::user();

        $team = null;

        $team = $user->currentTeam;

        $link = (new DomainRepository())->createLink($domain, $user, $team, $this->link, $this->customUrl);

        session()->flash('message', 'Link Created Successfully');

        $this->link = '';
        $this->emit('linkCreated');
    }

}
