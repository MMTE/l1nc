<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use Livewire\Component;

class CreateDomain extends Component
{
    public $domain;

    public function render()
    {
        return view('livewire.create-domain');
    }

    public function submit()
    {
        // extract domain into subdomain and primary domain only
        $domain = new Domain();
        $domain->domain = $this->domain;
        $domain->save();
        $this->emit('domainCreated');
    }
}
