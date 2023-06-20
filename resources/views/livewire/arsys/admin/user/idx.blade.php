@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b>User</b> | Management
                </div>
                <div class="card-body">
                    @livewire('arsys.admin.user.selector', key('admin.user'))
                </div>
            </div>
        </div>
    </div>
</div>
@endsection