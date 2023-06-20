<div>
    <div class="card" wire:key='"arsys-admin-user-components-staff-add'>
        <div class="card-header bg-warning">
            <div class="row">
                <div class="col-md-12 text-right">
                    <i class="fa fa-times-circle" wire:click="$emitUp('addStaffEnable_AdminUserStaff')" style="color: red; cursor:pointer" ></i>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6" >
                            <x-adminlte-input placeholder="Not defined" wire:model="faculty" name="faculty" label="Faculty" style="width: 100%" disabled/>
                        </div>
                        <div class="col-md-6">
                            <x-adminlte-input placeholder="Not defined" wire:model="department" name="department" label="Department" style="width: 100%" disabled/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <x-adminlte-select2 label="Program of study" style="width: 100%" wire:model="program" id="program" name="program">
                                <option default>Please select the program</option>
                                @foreach ($programs as $index => $program)
                                    <option value="{{$program->id}}"><b>{{$program->code}}</b>-{{$program->description}}</option>
                                @endforeach
                            </x-adminlte-select2>
                            @error('program') <span class="text-danger">{{ $message }}</span><br> @enderror
        
                        </div>  
                        <div class="col-md-5">
                            <x-adminlte-select2 label="Specialization" style="width: 100%" wire:model="specialization" id="specialization" name="specialization">
                                <option default>Please select the specialization</option>
                                @foreach ($specializations as $index => $specialization)
                                    <option value="{{$specialization->id}}"><b>{{$specialization->data->abbrev}}</b>-{{$specialization->data->description}}</option>
                                @endforeach
                            </x-adminlte-select2>
                            @error('specialization') <span class="text-danger">{{ $message }}</span><br> @enderror
                        </div>  
                    </div>

                    <div class="row">
                        <div class="col-md-6" >
                            <x-adminlte-input placeholder="First name" wire:model="firstName" name="firstName" label="First name" style="width: 100%"/>
                            @error('firstName') <span class="text-danger">{{ $message }}</span><br> @enderror

                        </div>
                        <div class="col-md-6">
                            <x-adminlte-input placeholder="Last name" wire:model="lastName" name="lastName" label="Last name" style="width: 100%"/>
                            @error('lastName') <span class="text-danger">{{ $message }}</span><br> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" >
                            <x-adminlte-input placeholder="Front title" wire:model="frontTitle" name="frontTitle" label="Front title" style="width: 100%"/>
                            @error('frontTitle') <span class="text-danger">{{ $message }}</span><br> @enderror
                        </div>
                        <div class="col-md-4">
                            <x-adminlte-input placeholder="Rear title" wire:model="rearTitle" name="rearTitle" label="Rear title" style="width: 100%"/>
                            @error('rearTitle') <span class="text-danger">{{ $message }}</span><br> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <x-adminlte-select2 label="Position" style="width: 100%" wire:model="position" id="position" name="position">
                                <option default>Please select the position</option>
                                @foreach ($positions as $index => $position)
                                    <option value="{{$position->id}}"><b>{{$position->abbrev}}</b>-{{$position->description}}</option>
                                @endforeach
                            </x-adminlte-select2>
                            @error('position') <span class="text-danger">{{ $message }}</span><br> @enderror
                        </div>  
                        <div class="col-md-5">
                            <x-adminlte-select2 label="Struture" style="width: 100%" wire:model="structure" id="structure" name="structure">
                                <option default>Please select the structure</option>
                                @foreach ($structures as $index => $structure)
                                    <option value="{{$structure->id}}">{{$structure->structure}} - {{$structure->classification}}</option>
                                @endforeach
                            </x-adminlte-select2>
                            @error('structure') <span class="text-danger">{{ $message }}</span><br> @enderror
                        </div>  
                    </div>

                    <div class="row">
                        <div class="col-md-4" >
                            <x-adminlte-input placeholder="Employee Id" wire:model="employeeId" name="employeeId" label="Employee Id" style="width: 100%"/>
                            @error('employeeId') <span class="text-danger">{{ $message }}</span><br> @enderror
                        </div>
                        <div class="col-md-4">
                            <x-adminlte-input placeholder="Code" wire:model="code" name="code" label="Code" style="width: 100%"/>
                            @error('code') <span class="text-danger">{{ $message }}</span><br> @enderror
                        </div>
                        <div class="col-md-4">
                            <x-adminlte-input placeholder="Univ code" wire:model="univCode" name="univCode" label="University code" style="width: 100%"/>
                            @error('univCode') <span class="text-danger">{{ $message }}</span><br> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" >
                            <x-adminlte-input placeholder="Phone number" wire:model="phone" name="phone" label="Phone number" type="number" style="width: 100%"/>
                            @error('phone') <span class="text-danger">{{ $message }}</span><br> @enderror
                        </div>
                        <div class="col-md-4">
                            <x-adminlte-input placeholder="Email address" wire:model="email" name="email" label="Email" type="email" style="width: 100%"/>
                            @error('email') <span class="text-danger">{{ $message }}</span><br> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <x-adminlte-select2 label="Job role" style="width: 100%" wire:model="role" id="role" name="role">
                                <option default>Please select the job role</option>
                                @foreach ($roles as $index => $role)
                                    <option value="{{$role->id}}">{{$role->code}} - {{$role->description}}</option>
                                @endforeach
                            </x-adminlte-select2>
                            @error('role') <span class="text-danger">{{ $message }}</span><br> @enderror
                        </div>  
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 text-left">
                    <x-adminlte-button   wire:click="save" theme="success" icon="fa fa-save" class="btn btn-sm" label="Save"/>
                </div>
            </div>
        </div>
    </div>  
    <hr>
    @push('scripts')
    <script>
        //var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {
            $('#program').on('change', function (e) {
                let dataProgram = $(this).val();
                @this.set('program', dataProgram);
                //console.log('here');
                //window.livewire.emit('selectProgram');
            });
            $('#specialization').on('change', function (e) {
                let dataSpecialization = $(this).val();
                @this.set('specialization', dataSpecialization);
                //window.livewire.emit('selectSpecialization');
                //console.log('here');
            });

            $('#position').on('change', function (e) {
                let dataPosition = $(this).val();
                @this.set('position', dataPosition);
                //window.livewire.emit('selectSpecialization');
                //console.log('here');
            });

            $('#structure').on('change', function (e) {
                let dataStructure = $(this).val();
                @this.set('structure', dataStructure);
                //window.livewire.emit('selectSpecialization');
                //console.log('here');
            });

            $('#role').on('change', function (e) {
                let dataRole = $(this).val();
                @this.set('role', dataRole);
                //window.livewire.emit('selectSpecialization');
                //console.log('here');
            });
            
            
      

            window.livewire.on('reloadSelectProgram',()=>{
                $('#program').select2('destroy');
                $('#program').select2();
            });

            window.livewire.on('reloadSelectSpecialization',()=>{
                $('#specialization').select2('destroy');
                $('#specialization').select2();
            });
            window.livewire.on('reloadSelectPosition',()=>{
                $('#position').select2('destroy');
                $('#position').select2();
            });
            window.livewire.on('reloadSelectStructure',()=>{
                $('#structure').select2('destroy');
                $('#structure').select2();
            });
            window.livewire.on('reloadSelectRole',()=>{
                $('#role').select2('destroy');
                $('#role').select2();
            });

        });
    </script>
@endpush                     
    
</div>
