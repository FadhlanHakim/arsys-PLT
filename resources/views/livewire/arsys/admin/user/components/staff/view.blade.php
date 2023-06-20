<div>
    <div x-data="{viewStaffEnable: @entangle('viewStaffEnable')}">
        <div x-show="viewStaffEnable">
            @if(!is_null($staff))
                <div class="card">
                    <div class="card-header bg-warning">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6" >
                                        @if(!is_null($staff->program))
                                            <x-adminlte-input disabled placeholder="{{$staff->program->department->abbrev}} - {{$staff->program->department->description}}" name="faculty" label="Faculty" style="width: 100%"/>
                                        @else
                                            <x-adminlte-input disabled name="faculty" label="Faculty" style="width: 100%"/>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        @if(!is_null($staff->program))
                                            <x-adminlte-input disabled placeholder="{{$staff->program->department->faculty->abbrev}} - {{$staff->program->department->faculty->description}}" name="department" label="Department" style="width: 100%"/>
                                        @else
                                            <x-adminlte-input disabled name="department" label="Department" style="width: 100%"/>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        @if(!is_null($staff->program))
                                            <x-adminlte-input disabled placeholder="{{$staff->program->code}} - {{$staff->program->description}}" name="department" label="Department" style="width: 100%"/>
                                        @else
                                            <x-adminlte-input disabled name="department" label="Department" style="width: 100%"/>
                                        @endif  
                                    </div>
                                    <div class="col-md-5">
                                        @if(!is_null($staff->specialization))
                                            <x-adminlte-input disabled placeholder="{{$staff->specialization->abbrev}} - {{$staff->specialization->description}}" name="department" label="Department" style="width: 100%"/>
                                        @else
                                            <x-adminlte-input disabled name="department" label="Department" style="width: 100%"/>
                                        @endif 
                                    </div>  
                                </div>

                                <div class="row">
                                    <div class="col-md-6" >
                                        <x-adminlte-input disabled placeholder="{{$staff->first_name}}" name="firstName" label="First name" style="width: 100%"/>

                                    </div>
                                    <div class="col-md-6">
                                        <x-adminlte-input disabled placeholder="{{$staff->last_name}}" name="lastName" label="Last name" style="width: 100%"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" >
                                        <x-adminlte-input disabled placeholder="{{$staff->front_title}}" name="frontTitle" label="Front title" style="width: 100%"/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-adminlte-input disabled placeholder="{{$staff->rear_title}}" name="rearTitle" label="Rear title" style="width: 100%"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        @if(!is_null($staff->position))
                                            <x-adminlte-input disabled placeholder="{{$staff->position->description}}" name="position" label="Position" style="width: 100%"/>
                                        @else
                                            <x-adminlte-input disabled name="position" label="Position" style="width: 100%"/>
                                        @endif
                                    </div>  
                                    <div class="col-md-5">
                                        @if(!is_null($staff->structure))
                                            <x-adminlte-input disabled placeholder="{{$staff->structure->structure}} {{$staff->structure->classification}}" name="position" label="Struture" style="width: 100%"/>
                                        @else
                                            <x-adminlte-input disabled name="position" label="Struture" style="width: 100%"/>
                                        @endif
                                    </div>  
                                </div>

                                <div class="row">
                                    <div class="col-md-4" >
                                        <x-adminlte-input disabled placeholder="{{$staff->employee_id}}" name="employeeId" label="Employee Id" style="width: 100%"/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-adminlte-input disabled placeholder="{{$staff->code}}" name="code" label="Code" style="width: 100%"/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-adminlte-input disabled placeholder="{{$staff->univ_code}}" name="univCode" label="University code" style="width: 100%"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" >
                                        <x-adminlte-input disabled placeholder="{{$staff->phone}}" name="phone" label="Phone number" type="number" style="width: 100%"/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-adminlte-input disabled placeholder="{{$staff->email}}" name="email" label="Email" type="email" style="width: 100%"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        @if(!is_null($staff->role))
                                            <x-adminlte-input disabled placeholder="{{$staff->role}}" name="role" label="Job role" type="email" style="width: 100%"/>
                                        @else
                                            <x-adminlte-input disabled name="role" label="Job role" type="email" style="width: 100%"/>
                                        @endif
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <x-adminlte-button   wire:click="closeView({{$staff->id}})" theme="warning" icon="fa fa-edit" class="btn btn-xs" label="Edit"/>
                            </div>
                        </div>
                    </div>
                </div>  
            @endif
        </div>
    </div>
</div>
