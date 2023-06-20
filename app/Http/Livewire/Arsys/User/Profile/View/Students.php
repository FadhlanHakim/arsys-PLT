<?php

namespace App\Http\Livewire\Arsys\User\Profile\View;

use Livewire\Component;
use App\Models\ArSys\Student;
use Auth;

class Students extends Component
{
    public $student;
    public function render()
    {
        return view('livewire.arsys.user.profile.view.students');
    }

    public function mount(){
        $this->student = Student::where('user_id', Auth::user()->id)->first();
    }

    public function edit(){
        return redirect()->route('arsys.user.profile.edit');
    }
}
