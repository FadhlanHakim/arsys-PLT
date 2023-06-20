<?php

namespace App\Http\Livewire\Arsys\Components\Dropdown;

use Livewire\Component;
use App\Models\ArSys\StaffProgramPivot;
class Staff extends Component
{
    public $staffs;
    public function render()
    {
        return view('livewire.arsys.components.dropdown.staff');
    }
    public function mount($program){
        if(!is_null($program)){
            $this->staffs = StaffProgramPivot::where('program_id', $program)->get();
        }else{
            $this->staffs = collect();
        }
        
    }
}
