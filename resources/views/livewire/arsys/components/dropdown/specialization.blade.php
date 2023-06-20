<div>
    <div wire:ignore>
        <x-adminlte-select2 data-select2-id="dataSpec" id="specialization" name="data-select2-id" >
            @foreach ($specializations as $index => $specialization)
                <option value="{{$specialization->data->id}}">{{++$index}}. {{$specialization->data->description}}</option>
            @endforeach
        </x-adminlte-select2>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#specialization').on('change', function (e) {
                    //console.log($(this).select2('data'));
                    var dataSpecialization = $('#specialization').select2("val");
                    @this.set('program', dataSpecialization);
                    window.livewire.emit('selectSpecialization', { specialization : dataSpecialization });
                });
            
        </script>
    @endpush

</div>


