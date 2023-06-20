<?php

namespace App\Http\Livewire\Arsys\Admin\User\Components\Student;

use Livewire\Component;
use App\Models\ArSys\Student;
use App\Models\ArSys\StudyProgram;
use App\Models\ArSys\StudySpecializationPivot;
use App\Models\ArSys\Staff;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Auth;

class Add extends Component
{
    public $faculty;
    public $department;
    public $studentProgram;
    public $studentSpecialization;
    public $studentSupervisor;
    public $firstName;
    public $lastName;
    public $studentId;
    public $supervisor;
    public $phone;
    public $email;
    public $programs;

    public function render()
    {
        if (!is_null($this->studentProgram)) {
            $this->specializations = StudySpecializationPivot::where('program_id', $this->studentProgram)->get();
            $this->department = StudyProgram::where('id', $this->studentProgram)->first()->department->abbrev.'-'.
                                StudyProgram::where('id', $this->studentProgram)->first()->department->description;
            $this->faculty = StudyProgram::where('id', $this->studentProgram)->first()->department->faculty->abbrev.'-'.
                             StudyProgram::where('id', $this->studentProgram)->first()->department->faculty->description;
            $this->supervisors = Staff::where('program_id', $this->studentProgram)->get();
        }
        return view('livewire.arsys.admin.user.components.student.add');
    }
    public function mount(){
        $this->programs = StudyProgram::all();
        $this->specializations = collect();
        $this->supervisors = collect();
        $this->clearForm();
    }

    public function hydrate(){
        $this->emit('reloadSelectStudentProgram');
        $this->emit('reloadSelectStudentSpecialization');
        $this->emit('reloadSelectStudentSupervisor');
    }

    public function clearForm(){
        $this->resetErrorBag();
        $this->resetValidation();
        $this->faculty = '';
        $this->department = '';
        $this->specialization = '';

        $this->firstName = '';
        $this->lastName = '';
        $this->studentId = '';
        $this->supervisor = '';
        $this->phone = '';
        $this->email = '';
    }

}