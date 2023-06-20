<div>
    <div x-data="{editStaffEnable: @entangle('editStaffEnable')}">
        <div x-show="editStaffEnable">
            @if(!is_null($staff))
                <div class="card">
                    <div class="card-header bg-warning">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <x-adminlte-button   wire:click="closeView({{$staff->id}})" theme="success" icon="fa fa-save" class="btn btn-xs" label="Update"/>
                                <x-adminlte-button wire:click="closeEdit({{$staff->id}})" theme="danger" label="Cancel" icon="fa fa-times-circle" class="btn btn-xs"/>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
