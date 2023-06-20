<?php

namespace App\Http\Livewire\Arsys\User\Profile\Edit;

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
    public $faculty;
    public $department;
    public $program;
    public $specialization;
    Public $supervisor;
    public $studentNumber;
    public $phoneNumber;
    public $email;
    public $firstName;
    public $lastName;
   

    public $programs;
    public $specializations;
    public $staffs;
    public $listeners = ['selectProgram', 
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
        return view('livewire.arsys.user.profile.edit.students');
    }
    public function mount(){
        $student = Student::where('user_id', Auth::user()->id)->first();
        if(!is_null($student->program))
            $this->program = $student->program->id;
            $this->faculty = $student->program->department->faculty->description;
            $this->department = $student->program->department->description;
        if(!is_null($student->specialization))
            $this->specialization = $student->specialization->id;
        if(!is_null($student->supervisor))
            $this->supervisor = $student->supervisor->id;

        $this->studentNumber = $student->student_id;
        $this->phoneNumber = $student->phone;
        $this->email = $student->email;
        $this->firstName = $student->first_name;
        $this->lastName = $student->last_name;;
        $this->programs = StudyProgram::all();
        $this->specializations = StudySpecializationPivot::where('program_id', $this->program)->get();
        $this->staffs = Staff::where('program_id', $this->program)->get();
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
    public function selectProgram(){
        $this->specialization = null;
        $this->supervisor = null;
    }   
    public function setSpecialization_UserProfileCreateFormStudent(){
        $this->resetForm();
    }   
    public function setSupervisor_UserProfileCreateFormStudent($supervisor){
        $this->supervisor = $supervisor;
        $this->resetForm();
    }   

    protected $rules = [
        'program' => 'required',
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

    public function updateProfile(){
        $this->validate();
        
        if(!is_null(Student::where('code', Auth::user()->sso)->first())){
            $specialization = $this->specialization;
            Student::where('code', Auth::user()->sso)->
            update([
                'program_id' => $this->program,
                'specialization_id' => $specialization,
                'supervisor_id' => $this->supervisor,
                'student_id' => $this->studentNumber,
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
                'email' => $this->email,
                'phone' => $this->phoneNumber,
            ]);
            $this->alert('success', 'The profile has updated');
            return redirect()->route('arsys.user.profile.view');
        }
    }
}
