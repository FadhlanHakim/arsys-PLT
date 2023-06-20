<div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="department-tab" href="#" style="cursor:pointer" wire:click="selectMenu('department')" data-toggle="tab" role="tab" aria-controls="department" aria-selected="true">Department</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="faculty-tab" href="#" style="cursor:pointer" wire:click="selectMenu('faculty')" data-toggle="tab"  role="tab" aria-controls="faculty" aria-selected="false">Faculty</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="program-tab" href="#" style="cursor:pointer" wire:click="selectMenu('program')" data-toggle="tab" role="tab" aria-controls="program" aria-selected="false">Program</a>
        </li>
    </ul>
    <div class="card">
        @if(!is_null($selectedMenu))
            <div class="card-body">
                @if($selectedMenu == 'department')
                @endif
                @if($selectedMenu == 'faculty')
                @endif
                @if($selectedMenu == 'program')
                    @livewire('arsys.admin.config.institution.components.program')
                @endif
            </div>
        @endif
    </div>
    @push('script')
    <script>
        $(document).ready(function(){
            window.livewire.on('departmentActive',()=>{
                $('#department').addClass('active');
                $('#faculty').removeClass('active');
                $('#program').removeClass('active');
            });
            window.livewire.on('facultyActive',()=>{
                $('#faculty').addClass('active');
                $('#department').removeClass('active');
                $('#program').removeClass('active');
            });
            window.livewire.on('programActive',()=>{
                $('#program').addClass('active');
                $('#faculty').removeClass('active');
                $('#department').removeClass('active');
            });
            
    }); 
    </script>
    @endpush
</div>
