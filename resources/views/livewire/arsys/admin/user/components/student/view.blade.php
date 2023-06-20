<div>
    <div x-data="{viewStudentEnable: @entangle('viewStudentEnable')}">
        <div x-show="viewStudentEnable">
            @if(!is_null($student))
                <div class="card">
                    <div class="card-header bg-warning">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6" >
                                        @if(!is_null($student->program))
                                            <x-adminlte-input disabled placeholder="{{$student->program->department->abbrev}} - {{$student->program->department->description}}" name="faculty" label="Faculty" style="width: 100%"/>
                                        @else
                                            <x-adminlte-input disabled name="faculty" label="Faculty" style="width: 100%"/>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        @if(!is_null($student->program))
                                            <x-adminlte-input disabled placeholder="{{$student->program->department->faculty->abbrev}} - {{$student->program->department->faculty->description}}" name="department" label="Department" style="width: 100%"/>
                                        @else
                                            <x-adminlte-input disabled name="department" label="Department" style="width: 100%"/>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        @if(!is_null($student->program))
                                            <x-adminlte-input disabled placeholder="{{$student->program->code}} - {{$student->program->description}}" name="department" label="Program" style="width: 100%"/>
                                        @else
                                            <x-adminlte-input disabled name="department" label="Program" style="width: 100%"/>
                                        @endif  
                                    </div>
                                    <div class="col-md-3" >
                                        <x-adminlte-input disabled placeholder="{{$student->student_id}}" name="employeeId" label="Student number" style="width: 100%"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        @if(!is_null($student->specialization))
                                            <x-adminlte-input disabled placeholder="{{$student->specialization->abbrev}} - {{$student->specialization->description}}" name="department" label="Specialization" style="width: 100%"/>
                                        @else
                                            <x-adminlte-input disabled name="department" label="Specialization" style="width: 100%"/>
                                        @endif 
                                    </div>  
                                    <div class="col-md-5">
                                        @if(!is_null($student->supervisor))
                                            <x-adminlte-input 
                                                disabled placeholder="{{$student->supervisor->first_name}} {{$student->supervisor->last_name}}"
                                                name="role" label="Supervisor" type="email" style="width: 100%"/>
                                        @else
                                            <x-adminlte-input disabled name="role" label="Supervisor" type="email" style="width: 100%"/>
                                        @endif
                                    </div>  
                                </div>

                                <div class="row">
                                    <div class="col-md-6" >
                                        <x-adminlte-input disabled placeholder="{{$student->first_name}}" name="firstName" label="First name" style="width: 100%"/>

                                    </div>
                                    <div class="col-md-6">
                                        <x-adminlte-input disabled placeholder="{{$student->last_name}}" name="lastName" label="Last name" style="width: 100%"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" >
                                        <x-adminlte-input disabled placeholder="{{$student->phone}}" name="phone" label="Phone number" type="number" style="width: 100%"/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-adminlte-input disabled placeholder="{{$student->email}}" name="email" label="Email" type="email" style="width: 100%"/>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <x-adminlte-button   wire:click="$emit('userEdit_AdminUserStudent',{{$student->id}})" theme="warning" icon="fa fa-edit" class="btn btn-xs" label="Edit"/>
                            </div>
                        </div>
                    </div>
                </div>  
            @endif
        </div>
    </div>
</div>
