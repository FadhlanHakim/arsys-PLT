<?php

namespace App\Http\Livewire\Arsys\Admin\User;

use Livewire\Component;

class Selector extends Component
{
    public $staffTab = false;
    public $studentTab = false;
    public $accountTab = false;
    public function render()
    {
        return view('livewire.arsys.admin.user.selector');
    }

   
    public function selectMenu($menu){
        if(!is_null($menu)){
            if($menu == 'account'){
                $this->emit('startUserAccount_AdminUserAccount');
                $this->studentTab = false;
                $this->staffTab = false;
                $this->accountTab = true;
            }
            if($menu == 'staff'){
                $this->emit('startUserStaff_AdminUserStaff');
                $this->studentTab = false;
                $this->staffTab = true;
                $this->accountTab = false;
                
            }
            if($menu == 'student'){
                $this->emit('startUserStudent_AdminUserStudent');
                $this->studentTab = true;
                $this->staffTab = false;
                $this->accountTab = false;
                
            }
        }
    }

    public function mount(){
    }
}
