<?php

namespace App\Http\Livewire\Arsys\Admin\User\Components\Staff;

use Livewire\Component;
use App\Models\ArSys\Staff;
class View extends Component
{
    public $staff;
    public $viewStaffEnable = false;
    protected $listeners = ['staffView_AdminUserStaff', 'staffViewDisable_AdminUserStaff'];
    public function render()
    {
       
        return view('livewire.arsys.admin.user.components.staff.view');
    }
    public function staffView_AdminUserStaff($staffId){
        $this->staff= Staff::where('id', $staffId)->first();
        $this->viewStaffEnable = true;
    }
 
    public function closeView($staffId){
        $this->viewStaffEnable = false;
        $this->emit('staffEdit_AdminUserStaff', ['staffId' => $staffId]);
    }


}