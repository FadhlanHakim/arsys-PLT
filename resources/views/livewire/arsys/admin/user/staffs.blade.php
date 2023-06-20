<div>
    <div class="row">
        <div class="col-md-12 text-leftt">
            <div x-data="{addStaffEnable : @entangle('addStaffEnable') }">
                @if(!$addStaffEnable)
                    <div class="row">
                        <div class="col-md-12 text-right">
                        <x-adminlte-button   wire:click="addStaffEnable_AdminUserStaff" theme="success" icon="fa fa-plus-circle" class="btn btn-sm" label="Add staff"/>
                        </div>
                    </div>
                @endif
                <div x-show="addStaffEnable">
                    <livewire:arsys.admin.user.components.staff.add :wire:key="'arsys-admin-user-components-staff-add'">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive users-table">
                <table class="table table-sm data-table">
                    <thead class="thead">
                        <tr>
                            <th width="5%">No</th>
                            <th width="5%">Code</th>
                            <th width="5%">Univ. Code</th>
                            <th width="25%">Identity</th>
                            <th width="20%">Title</th>
                            <th width="5%">Program</th>
                            <th width="20%">Position</th>
                            <th width="5%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                     
                        @forelse ($staffs as $index => $staff)
                            @if($index%2 ==0 )
                                <tr class="bg-light" style="cursor: pointer" wire:click="expandView({{$index}}, {{$staff->id}})">
                            @else
                                <tr style="cursor: pointer" wire:click="expandView({{$index}}, {{$staff->id}})">
                            @endif
                                
                                    <td> {{$index+1}}</td>
                                @if(!$enabledExpandView[$index])
                                    <td>
                                        {{$staff->code}}
                                    </td>
                                    <td>
                                        {{$staff->univ_code}}
                                    </td>
                                    <td>
                                        {{$staff->first_name}} {{$staff->last_name}}
                                        <br>
                                        {{$staff->employee_id}} 
                                    </td>
                                    <td>
                                        {{$staff->front_title}} {{$staff->rear_title}}
                                    </td>
                                    <td>
                                        @if(!is_null($staff->program))
                                            {{$staff->program->code}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!is_null($staff->position))
                                            {{$staff->position->description}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!is_null($staff->status))
                                            {{$staff->status->abbrev}}
                                        @endif
                                    </td>
                                @else
                                    <td colspan="7" >
                                        <div class="text-center">
                                            <b>{{$staff->first_name}} {{$staff->last_name}}</b> Profile
                                            <br>
                                            <i style="color:red">Click to close</i>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                @if($enabledExpandView[$index])
                                    <td colspan="8">
                                        @livewire('arsys.admin.user.components.staff.view')
                                        @livewire('arsys.admin.user.components.staff.edit')
                                    </td>
                                @endif
                            </tr>
                           
                       @empty
                            No Data
                       @endforelse
                    </tbody>
                </table>
                {{$staffs->render()}}
            </div>
        </div>
    </div>
</div>
