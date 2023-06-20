@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b>Profile</b> | Create user profile
                </div>
                <div class="card-body">
                    @if(strlen(\App\Models\User::where('id', Auth::user()->id)->first()->sso) > 7)
                        @livewire('arsys.user.profile.create.students')
                    @else
                        @livewire('arsys.user.profile.create.students')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection