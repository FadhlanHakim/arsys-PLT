<?php

namespace App\Http\Livewire\Arsys\Admin\User\Components\Student;

use Livewire\Component;
use App\Models\ArSys\Student;
use App\Models\ArSys\StudyProgram;
use App\Models\ArSys\StudySpecializationPivot;
use App\Models\ArSys\Staff;
use Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditModal extends Component
{
    
    public function render()
    {
        return view('livewire.arsys.admin.user.components.student.edit-modal');
    }
    
    public function userEdit_AdminUserStudent(){
        $this->emit('editStudentModal_AdminUserStudent_Show');
    }
}
