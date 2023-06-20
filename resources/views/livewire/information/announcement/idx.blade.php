<div>
    {{-- Do your work, then step back. --}}
    <br>
    @if($addAnnouncement != true)
        <div class="row">
            <div class="col-sm-12 text-right">
                <x-adminlte-button wire:click="addAnnouncement_Enable" class="btn-sm" label="Add Announcement" theme="success" icon="fas fa-adjust"/>        
            </div>
        </div>
    @else
        @livewire('information.announcement.add')
    @endif
    <hr>

    <div class="row">
        <div class="col-sm-12">
            @if ($editEnable == true)
                @livewire('information.announcement.edit', ['announcementId' => $announcementId])
            @else
                @livewire('information.announcement.lists')    
            @endif
        </div>
    </div>


</div>
