<?php

namespace App\Http\Livewire\Information;

use Livewire\Component;

class Content extends Component
{
    public $content = null;

    protected $listeners  = ['setMenu_INFO'];
    public function render()
    {
        return view('livewire.information.content');
    }

    public function setMenu_INFO($selection)
    {
       $this->content = $selection;
    }
}
