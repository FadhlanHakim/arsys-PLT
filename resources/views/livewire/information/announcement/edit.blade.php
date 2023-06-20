<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="row">
        <div class="col-sm-12 text-right">
            <x-adminlte-button wire:click="$emitUp('announcementEdit_Disable')" class="btn-sm" label="x" theme="danger"/>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <b>Announcement</b> | Edit Announcement
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 text-right">
                    Tittle
                </div>
                <div class="col-sm-8">
                    <x-adminlte-input wire:model="title" name="iLabel" placeholder="Please type the announcement tittle"/>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-4 text-right">
                    Body
                </div>
                <div class="col-sm-8">
                    <x-adminlte-textarea wire:model="body" name="taBasic" placeholder="Please type the announcement body"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-right">
                    <x-adminlte-button wire:click="update" class="btn-sm" label="Update" theme="success" icon="fas fa-save"/>
                </div>   
            </div>
        </div>
        <div class="card-footer text-muted">
            @Arsys<i>2023</i>
        </div>
    </div>
</div>
