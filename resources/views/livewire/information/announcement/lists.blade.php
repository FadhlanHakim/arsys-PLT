<div>
    {{-- The whole world belongs to you. --}}
    <b><h3>List of Announcement</h3></b>
    <hr>
    @foreach ($announcements as $index => $announcement)
        {{$index+1}}. {{$announcement->title}} <i wire:click="$emitUp('announcementEdit_Enable', {{$announcement->id}})" class="fa fa-edit fa-xs" style="color:orange; cursor: pointer;"></i>
        <i wire:click="delete({{$announcement->id}})" class="fa fa-trash fa-xm" style="color:red; cursor: pointer;"></i>
        <br>
    @endforeach
</div>
