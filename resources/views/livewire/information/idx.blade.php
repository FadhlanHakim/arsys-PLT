<div>
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @livewire('information.menu')
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <!--Content Menu-->
            @livewire('information.content')
        </div>
    </div>    
    @endsection
</div>