<?php

namespace App\Http\Livewire\Information\Announcement;

use Livewire\Component;
use App\Models\Information\Announcement;

class Edit extends Component
{
    public $title, $body;
    public $announcementId;
    public function render()
    {
        return view('livewire.information.announcement.edit');
    }

    public function mount($announcementId){
        $this->announcementId = $announcementId;
        $announcement = Announcement::where('id', $announcementId)->first();
        $this->title = $announcement->title;
        $this->body = $announcement->body;
    }

    public function update(){
        Announcement::where('id', $this->announcementId)->update([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->emitUp('announcementEdit_Disable');
    }
}
