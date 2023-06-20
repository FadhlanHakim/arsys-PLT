<?php

namespace App\Http\Livewire\Information;

use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        return view('livewire.information.menu');
    }

    public function setMenu($selection)
    {
       $this->emit('setMenu_INFO', $selection);

    }

}
