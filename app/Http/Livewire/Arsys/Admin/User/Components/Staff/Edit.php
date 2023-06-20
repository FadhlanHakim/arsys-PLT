<?php

namespace App\Http\Livewire\Arsys\Admin\User\Components\Staff;

use Livewire\Component;
use App\Models\ArSys\Staff;

class Edit extends Component
{
    public $staff;
    public $editStaffEnable = false;
    protected $listeners = ['staffEdit_AdminUserStaff'];
    public function render()
    {
       
        return view('livewire.arsys.admin.user.components.staff.edit');
    }
    public function staffEdit_AdminUserStaff($staffId){
        $this->staff = Staff::where('id', $staffId)->first();
        $this->editStaffEnable = true;
    }

    public function closeEdit($staffId){
        $this->editStaffEnable = false;
        $this->emit('staffView_AdminUserStaff', ['staffId' => $staffId]);
    }
}
