<?php

namespace App\Http\Livewire\Arsys\Components\Dropdown;

use Livewire\Component;
use App\Models\ArSys\StudyProgram;
use App\Models\ArSys\StudySpecializationPivot;
use App\Models\ArSys\Staff;
class ProfileStudent extends Component
{
    
    public $faculty;
    public $department;
    public $program;
    public $specialization;
    public $staff;

    public $programs;
    public $specializations;
    public $staffs;
    public $listeners = ['selectProgram', 'selectSpecialization', 'selectStaff'];
    public function render()
    {
        if (!is_null($this->program)) {
            $this->specializations = StudySpecializationPivot::where('program_id', $this->program)->get();
            $this->staffs = Staff::where('program_id', $this->program)->get();
            $this->department = StudyProgram::where('id', $this->program)->first()->department->abbrev.'-'.
                                StudyProgram::where('id', $this->program)->first()->department->description;
            $this->faculty = StudyProgram::where('id', $this->program)->first()->department->faculty->abbrev.'-'.
                             StudyProgram::where('id', $this->program)->first()->department->faculty->description;
        }
        return view('livewire.arsys.components.dropdown.profile-student');
    }
    public function mount(){
        $this->programs = StudyProgram::all();
        $this->specializations = collect();
        $this->staffs = collect();
    }

    public function selectProgram(){
        $this->emit('setProgram_UserProfileCreateFormStudent', ['program' => $this->program]);
    }

    public function selectSpecialization(){
        $this->emit('setSpecialization_UserProfileCreateFormStudent', ['specialization' => $this->specialization]);
    }
    
    public function selectStaff(){
        $this->emit('setSupervisor_UserProfileCreateFormStudent', ['supervisor' => $this->staff]);
    }

    public function hydrate()
    {
        $this->emit('reloadSelectSpecialization');
        $this->emit('reloadSelectStaff');
        $this->emit('reloadSelectProgram');
    }
}
