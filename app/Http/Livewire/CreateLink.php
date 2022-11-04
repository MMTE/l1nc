<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use App\Models\Link;
use App\Repositories\DomainRepository;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateLink extends Component
{

    public $link;
    public $protocol = 'https';
    public $domain = null;

    public function render()
    {
        return view('livewire.create-link', [
            'domains' => Domain::all()
        ]);
    }

    public function submit()
    {
        $domain = Domain::where('domain', $this->domain)->first();

        $link = new Link();
        $link->domain_id = $domain?->id;
        $link->url = $this->generateRandomString();
        $link->destination = (new DomainRepository())->parsUrl($this->link);
        $link->save();

        session()->flash('message', 'Link Created Successfully');
        $this->link = '';
        $this->emit('linkCreated');
    }

    function generateRandomString($length = 5)
    {
        $bytes = random_bytes($length);
        return substr(strtr(base64_encode($bytes), '+/', '-_'), 0, $length);
    }

}
