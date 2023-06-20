<?php

namespace App\Http\Livewire\Arsys\Components\Dropdown;

use Livewire\Component;
use App\Models\ArSys\StudySpecializationPivot;

class Specialization extends Component
{
    public $program;
    protected $listeners =['selectSpecialization', 'refreshSpecialization'];
    public function render()
    {
        $specializations = StudySpecializationPivot::where('program_id', $this->program)->get();

        return view('livewire.arsys.components.dropdown.specialization', ['specializations' => $specializations]);
    }

    public function mount($program){
        $this->program = $program;
    }

    public function selectSpecialization($specialization){
        dd($specialization);
    }
   
    public function refreshSpecialization(){
        dd('here');
    }
}