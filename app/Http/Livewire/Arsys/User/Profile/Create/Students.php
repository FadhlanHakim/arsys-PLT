<?php

namespace App\Http\Livewire\Arsys\User\Profile\Create;

use Livewire\Component;
use App\Models\ArSys\Student;
use App\Models\ArSys\StudyProgram;
use App\Models\ArSys\StudySpecializationPivot;
use App\Models\ArSys\Staff;
use Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Students extends Component
{
    use LivewireAlert;
    public $program;
    public $specialization;
    Public $supervisor;
    public $studentNumber;
    public $phoneNumber;
    public $email;
    public $firstName;
    public $lastName;

    public $faculty;
    public $department;

    public $programs;
    public $specializations;
    public $staffs;
    public $listeners = ['setProgram_UserProfileCreateFormStudent', 
                        'setSupervisor_UserProfileCreateFormStudent',
                        'setSpecialization_UserProfileCreateFormStudent'];
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
        return view('livewire.arsys.user.profile.create.students');
    }

    public function mount(){
        $this->programs = StudyProgram::all();
        $this->specializations = collect();
        $this->staffs = collect();
    }

    public function hydrate()
    {
        $this->emit('reloadSelectSpecialization');
        $this->emit('reloadSelectStaff');
        $this->emit('reloadSelectProgram');
    }

    public function resetForm(){
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function setProgram_UserProfileCreateFormStudent($program){
       $this->program = $program;
       $this->resetForm();
    }   
    public function setSpecialization_UserProfileCreateFormStudent($specialization){
        $this->specialization = $specialization;
        $this->resetForm();
    }   
    public function setSupervisor_UserProfileCreateFormStudent($supervisor){
        $this->supervisor = $supervisor;
        $this->resetForm();
    }   

    protected $rules = [
        'program' => 'required',
        'specialization' => 'required',
        'supervisor' => 'required',
        'studentNumber' => 'required|max:7',
        'phoneNumber' => 'required',
        'email' => 'required|email',
        'firstName' => 'required',
        'lastName' => 'required',
    ];
    protected $messages = [
            'program.required' => 'The Program of Study is required',
            'email.required' => 'The Email Address cannot be empty.',
    ];

    public function save(){
        $this->validate();
        if(is_null(Student::where('code', Auth::user()->sso)->first())){
            if(is_null($this->specialization))
                $specialization = null;
            else
                $specialization = $this->specialization;
            Student::create([
                'user_id' => Auth::user()->id,
                'program_id' => $this->program,
                'specialization_id' => $specialization,
                'supervisor_id' => $this->supervisor,
                'student_id' => $this->studentNumber,
                'code' => Auth::user()->sso,
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
                'email' => $this->email,
                'phone' => $this->phoneNumber,
            ]);
            $this->alert('success', 'The profile has been recorded');
            return redirect()->route('arsys.user.profile.view');
        }else{
            $this->alert('warning', 'The profile is already in database');
            return redirect()->route('arsys.user.profile.view');
        }
    }
}
