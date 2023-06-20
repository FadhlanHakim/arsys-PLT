<?php

namespace App\Http\Livewire\Arsys\Admin\Config\Institution;

use Livewire\Component;

class Selector extends Component
{
    public $selectedMenu = NULL;
    public function render()
    {
        return view('livewire.arsys.admin.config.institution.selector');
    }

    public function selectMenu($menu){
        if(!is_null($menu)){
            $this->selectedMenu = $menu;

            if($menu == 'department'){
                $this->emit('departmentActive');
            }
            if($menu == 'faculty'){
                $this->emit('facultyActive');
            }
            if($menu == 'program'){
                $this->emit('programActive');
            }
        }
    }
    
}
