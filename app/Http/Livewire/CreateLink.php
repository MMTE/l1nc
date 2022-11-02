<?php

namespace App\Http\Livewire;

use App\Models\Link;
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

        // link generator?
        /*
         * 1 character only remains available for x time
         * 2 character only remains for .....
         * 3 character only remains for ....
         * 4 character only remains for ....
         * and so on ...
         * but more than 4 characters will remain forever
         * custom names
         *
         */

        $link = new Link();
        $link->url = $this->generateRandomString();
        $link->original = $this->link;
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
