@section('content')
    <div>
        <div class="card text-left">
            <div class="card-header">
                Review|New research proposal
            </div>
            <div class="card-body">
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </nav>
                <hr>
                <table class="table table-striped">
                    <thead class="text-center">
                        <tr>
                            <th class="text-center" scope="col">Research Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_research as $data)
                            <tr>
                                <td scope="row">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div>
                                                        <h6>{{ $data->student->program->code }}.{{ $data->student->student_number }}
                                                        </h6>
                                                        <h6>{{ $data->student->specialization->description }}</h6>
                                                        <h6 class="font-weight-bolder">
                                                            {{ $data->student->first_name . ' ' . $data->student->last_name }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="text-left card-header bg-info">
                                                    <h6 class="font-weight-bold">
                                                        {{ $data->applicant->event->type->event_type ?? '' }}
                                                        {{-- Skripsi --}}
                                                        {{ $data->student->program->description }}
                                                    </h6>
                                                    <h6>Status: <i>{{ $data->milestone->description ?? '-' }}</i></h6>
                                                    <h6 class="font-weight-bold"><u>{!! $data->title !!}</u></h6>
                                                    <h6>File of propisal could be accessed <a
                                                            href="{{ $data->file ?? 'https://youtu.be/dQw4w9WgXcQ' }}"
                                                            target="_blank">here</a></h6>
                                                    <br>
                                                    <hr>
                                                    <h6>Created at {{ date('j F Y', strtotime($data->created_at)) }}</h6>
                                                    <h6>Updated at {{ date('j F Y', strtotime($data->updated_at)) }}</h6>
                                                </div>
                                                <div class="text-left card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h5 class="font-weight-bold">Reviewer(s) of Student's Proposal
                                                            </h5>
                                                            <ol>
                                                                @php
                                                                    if (count($data->proposalReview) > 0) {
                                                                        foreach ($data->proposalReview as $reviewer) {
                                                                            echo "
                                                                            <li>" .
                                                                                $reviewer->faculty->first_name .
                                                                                ' ' .
                                                                                $reviewer->faculty->last_name .
                                                                                "<span class='ml-1 badge badge-pill badge-dark'>" .
                                                                                $reviewer->faculty->code .
                                                                                "</span></li>
                                                                            ";
                                                                        }
                                                                    } else {
                                                                        echo "<span class='badge badge-pill badge-warning'> The Reviewer should be assign </span></li>";
                                                                    }
                                                                @endphp
                                                            </ol>
                                                            <br>
                                                            <button type="button" class="btn btn-primary btn-sm">
                                                                <i class="fa fa-user-plus"></i> Assign
                                                            </button>
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div class="col-sm-6">
                                                            <h5 class="font-weight-bold">Supervisor(s) of Student's Proposal
                                                            </h5>
                                                            <ol class="font-weight-bold">
                                                                @php
                                                                    if (count($data->supervisor) > 0) {
                                                                        foreach ($data->supervisor as $supervisor) {
                                                                            echo "
                                                                            <li>" .
                                                                                $supervisor->faculty->first_name .
                                                                                ' ' .
                                                                                $supervisor->faculty->last_name .
                                                                                "<span class='ml-1 badge badge-pill badge-dark'>" .
                                                                                $supervisor->faculty->code .
                                                                                "</span></li>
                                                                            ";
                                                                        }
                                                                    } else {
                                                                        echo "<span class='badge badge-pill badge-warning'> The Supervisor should be assign </span></li>";
                                                                    }
                                                                @endphp
                                                            </ol>
                                                            <br>
                                                            <button type="button" class="btn btn-primary btn-sm">
                                                                <i class="fa fa-user-plus"></i> Assign
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h5 class="mb-0 font-weight-bold"><i
                                                                    class="fa fa-quote-right"></i> Discussion <sup
                                                                    class="text-danger"><i
                                                                        class="fa  fa-envelope mr-1"></i>{{ $data->reviewDiscussion->count() }}</sup>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h5 class="mb-0 font-weight-bold">Decision</h5>
                                                            <button class="btn btn-sm btn-danger">Reject</button>
                                                            <button class="btn btn-sm btn-warning">Revise</button>
                                                            <button class="btn btn-sm btn-primary">Presentation</button>
                                                            <button class="btn btn-sm btn-success">Approve</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-muted">
                FAdhlan L hkaim copyrihght
            </div>
        </div>
    </div>
@endsection
