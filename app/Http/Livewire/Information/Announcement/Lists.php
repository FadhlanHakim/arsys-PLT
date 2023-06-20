<?php

namespace App\Http\Livewire\Information\Announcement;

use Livewire\Component;
use App\Models\Information\Announcement;

class Lists extends Component
{
    protected $listeners = ['refresh_Announcement_Lists' => '$refresh'];
    public function render(){
        $announcements = Announcement::all();
        return view('livewire.information.announcement.lists', ['announcements' => $announcements]);
    }

    public function delete($announcementId){
        Announcement::find($announcementId)->delete();
    }
}
