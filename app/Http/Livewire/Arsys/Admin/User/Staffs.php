<?php

namespace App\Http\Livewire\Arsys\Admin\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ArSys\Staff;

class Staffs extends Component
{
    public $enabledExpandView = [];
    use WithPagination;
    public $viewIndex = null;
    public $tempIndex = null;
    public $addStaffEnable = false;
    public $viewStaffEnable = null;
    public $viewEnable = false;
    public $menu;
    protected $listeners = ['addStaffEnable_AdminUserStaff', 'startUserStaff_AdminUserStaff'];
    protected $paginationTheme = 'bootstrap';
    public $pageNumber = null;
    public $allStaffs;

    public function render()
    {
        if($this->tempIndex != $this->viewIndex){
            $this->enabledExpandView[$this->viewIndex] = 1;
            $this->enabledExpandView[$this->tempIndex] = null;
            $this->tempIndex = $this->viewIndex;
        }     
        $staffs = Staff::where('position_id', '!=', null)->orderBy('position_id', 'ASC')
        ->orderBy('univ_code', 'ASC')->paginate(10);
        
        if($this->pageNumber != $staffs->currentPage()){
            foreach($staffs as $index => $staff){
                $this->enabledExpandView[$index] = null;
            }
            $this->pageNumber = $staffs->currentPage();
            $this->tempIndex = $staffs->count()+1;
            $this->viewIndex = $staffs->count()+1;
        }
        return view('livewire.arsys.admin.user.staffs', ['staffs' => $staffs]);
    }

    public function mount(){
        $this->addStaffEnable = false;
        $this->viewEnable = false;
    }
    public function expandView($viewIndex, $staffId){
        $this->viewIndex = $viewIndex;
        $this->enabledExpandView[$this->viewIndex] = 1;
        $this->enabledExpandView[$this->tempIndex] = 0;
        $this->addStaffEnable = false;
        $this->emit('staffView_AdminUserStaff', ['StaffId' => $staffId]);
    }

    public function addStaffEnable_AdminUserStaff(){
        if($this->addStaffEnable == false){
            $this->addStaffEnable = true;
            $this->enabledExpandView[$this->tempIndex] = 0;
        }else{
            $this->addStaffEnable = false;
        }
    }
    
    public function startUserStaff_AdminUserStaff(){
        $this->enabledExpandView[$this->tempIndex] = 0;
    }
}
