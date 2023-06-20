<?php

namespace App\Http\Livewire\Information\Announcement;

use Livewire\Component;
use App\Models\Information\Announcement;
use Auth;
use App\Models\Arsys\Staff;
use App\Models\Arsys\StaffStatus;

class Add extends Component
{
    public $title, $body, $firstAuthor, $anotherAuthor, $staffs;
    public $othersAuthor = [];
    public $counter = 0;
    public function render()
    {
        return view('livewire.information.announcement.add');
    }

    public function save(){
        Announcement::create([
            'title' => $this->title,
            'body' => $this->body,

        ]);
        $this->title = ' ';
        $this->body = ' ';
        $this->emit('refresh_Announcement_Lists');
    }

    public function mount(){
        if(Auth::user()->sso >= 9){
            $this->firstAuthor = Auth::user()->faculty->first_name. ' '. Auth::user()->faculty->last_name;
        }else{
            $this->firstAuthor = Auth::user()->student->first_name. ' '. Auth::user()->student->last_name;
        }

        $this->staffs = Staff::where('status_id', StaffStatus::where('abbrev', 'ACT')->first()->id)->get();
        
        //dd($this->staffs);
    }

    public function addAnotherAuthor(){
       // dd($this->anotherAuthor);
       $this->othersAuthor[$this->counter] = $this->anotherAuthor;
       $this->counter++;
    }
}
