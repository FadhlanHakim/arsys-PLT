<?php

namespace App\Http\Livewire\Arsys\Components\Dropdown;


use Livewire\Component;
use App\Models\ArSys\StudyProgram;

class Program extends Component
{
    public $listeners = ['selectProgram'];
    public $program;
    public function render()
    {
        $programs = StudyProgram::all();
        return view('livewire.arsys.components.dropdown.program', ['programs' => $programs]);
    }

    public function selectProgram(){
        $this->emitUp('selectStudyProgram',['program' => $this->program]);
    }
}


