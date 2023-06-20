<?php

namespace App\Http\Livewire\Arsys\Admin\User\Components\Staff;

use Livewire\Component;
use App\Models\ArSys\Staff;
use App\Models\ArSys\StaffPosition;
use App\Models\ArSys\StaffStructure;
use App\Models\ArSys\StaffRole;
use App\Models\ArSys\StudyProgram;
use App\Models\ArSys\StudySpecializationPivot;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Auth;
class Add extends Component
{
    use LivewireAlert;
    public $faculty;
    public $department;
    public $program;
    public $specialization;
    public $position;
    public $structure;

    
    public $firstName;
    public $lastName;
    public $frontTitle;
    public $rearTitle;
    public $code;
    public $univCode;
    public $employeeId;
    public $role;
    public $phone;
    public $email;
   
    public $programs;
    public $specializations;
    public $positions;
    public $structures;
    public $roles;

    public $listeners = ['setProgram_AdminUserProfileCreateFormStaff', 
                        'setSpecialization_AdminUserProfileCreateFormStaff',
                        'selectProgram',
                        'clearForm_AdminUserStaffAdd'];
    public function render()
    {
        if (!is_null($this->program)) {
            $this->specializations = StudySpecializationPivot::where('program_id', $this->program)->get();
            $this->department = StudyProgram::where('id', $this->program)->first()->department->abbrev.'-'.
                                StudyProgram::where('id', $this->program)->first()->department->description;
            $this->faculty = StudyProgram::where('id', $this->program)->first()->department->faculty->abbrev.'-'.
                             StudyProgram::where('id', $this->program)->first()->department->faculty->description;
        }

        if(!is_null($this->position)){
            $this->structures = StaffStructure::where('position_id', $this->position)->get();
        }

        return view('livewire.arsys.admin.user.components.staff.add');
    }

    public function clearForm_AdminUserStaffAdd(){
        $this->clearForm();
    }

    public function hydrate()
    {
        $this->emit('reloadSelectProgram');
        $this->emit('reloadSelectSpecialization');
        $this->emit('reloadSelectPosition');
        $this->emit('reloadSelectStructure');
        $this->emit('reloadSelectRole');
    }

    public function mount(){
        $this->programs = StudyProgram::all();
        $this->positions = StaffPosition::all();
        $this->roles = StaffRole::all();
        $this->specializations = collect();
        $this->structures = collect();
        $this->clearForm();
    }

    protected $rules = [
        'program' => 'required',
        'specialization' => 'required',
        'position' => 'required',
        'structure' => 'required',
        'firstName' => 'required',
        'frontTitle' => 'required', 
        'rearTitle' => 'required', 
        'lastName' => 'required',
        'employeeId' => 'required',
        'code' => 'required',
        'univCode' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
    ];
    protected $messages = [
            'program.required' => 'The Program of Study is required',
            'email.required' => 'The Email Address cannot be empty.',
    ];
    public function clearForm(){
        $this->resetErrorBag();
        $this->resetValidation();
        $this->faculty = '';
        $this->department = '';
        $this->specialization = '';
        $this->position = '';
        $this->structure = '';

        $this->firstName = '';
        $this->lastName = '';
        $this->frontTitle = '';
        $this->rearTitle = '';
        $this->code = '';
        $this->univCode = '';
        $this->employeeId = '';
        $this->role = '';
        $this->phone = '';
        $this->email = '';
    }

    public function save(){
        $this->validate();
        if(is_null(Staff::where('employee_id', $this->employeeId)->first())){
            Staff::create([
                'program_id' => $this->program,
                'specialization_id' => $this->specialization,
                'position_id' => $this->position,
                'structure_id' => $this->structure,
                'first_name' => $this->firstName,
                'last_name' => $this->lastName,
                'front_title' => $this->frontTitle,
                'rear_title' => $this->rearTitle,
                'code' => $this->code,
                'univ_code' => $this->univCode,
                'employee_id' => $this->employeeId,
                'phone' => $this->phone,
                'email' => $this->email,
            ]);
            $this->alert('success', 'The profile has been recorded');
            $this->clearForm();
        }
    }

    

}
