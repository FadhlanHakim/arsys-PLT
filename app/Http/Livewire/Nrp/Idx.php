<?php

namespace App\Http\Livewire\Nrp;

use Livewire\Component;
use App\Models\Entities\Research;

class Idx extends Component
{
    public $data_research;
    public function render()
    {
        // ngambil data cuman 10 biar engga nge leg pas di load
        $this->data_research = Research::all()->take(200);
        return view('livewire.nrp.idx')->layout('adminlte::page');
    }
}
