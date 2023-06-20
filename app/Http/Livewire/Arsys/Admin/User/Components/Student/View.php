<?php

namespace App\Http\Livewire\Arsys\Admin\User\Components\Student;

use Livewire\Component;
use App\Models\ArSys\Student;
class View extends Component
{
    public $student;
    public $viewStudentEnable = false;
    protected $listeners = ['studentView_AdminUserStudent', 'studentViewDisable_AdminUserStudent'];
    public function render()
    {
       
        return view('livewire.arsys.admin.user.components.student.view');
    }
    public function studentView_AdminUserStudent($studentId){
        $this->student= Student::where('id', $studentId)->first();
        $this->viewStudentEnable = true;
    }
 
    /*public function closeView($studentId){
        //$this->viewStudentEnable = false;
        $this->emit('studentEdit_AdminUserStudent', ['studentId' => $studentId]);
    }
    */
}
