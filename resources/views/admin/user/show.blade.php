@extends('admin.layouts.app')
@section('title', 'User Details')
@section('content')



<div class="container-xl">

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Details for User: {{ $user->name }} {{ $user->first_name }}</h1>
        </div>
        <div class="col-auto">
            {{-- <a class="btn-sm app-btn-secondary p-2" href="{{ route('admin.users.create') }}">Add New User</a> --}}
        </div><!--//col-auto-->
    </div><!--//row-->



    <div class="tab-conten/t" id="orders-table-tab-content">
        {{-- <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab"> --}}
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-2">
                    <div class="row">
                        <div class="col-sm-12 col-lg-3 col-md-4">
                            <label class="sr-only" for="signin-name">User Picture</label>
                            <img class="admin-profile-img w-100" id="preview" src="{{ route('user.image',['filename'=>$user->image]) }}" alt="">
                        </div>

                        <div class="col-lg-8 col-sm-12 col-md-9">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="email mb-3">
                                        <label for="name">Name(Nom)</label>
                                        <input disabled value="{{ $user->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="email mb-3">
                                        <label for="first_name">First Name (PreNom)</label>
                                        <input disabled value="{{ $user->first_name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input disabled value="{{ $user->email }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label for="phone">Phone</label>
                                        <input disabled value="{{ $user->phone }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label for="candidate_number">Candidate Number</label>
                                        <input disabled value="{{ $user->candidate_number }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label for="date_of_entry">Date of Entry</label>
                                        <input disabled value="{{ $user->date_of_entry }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="mb-3">
                                        <label for="code">Code</label>
                                        <input disabled value="{{ $user->code }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('admin.exams.create') }}" class="btn app-btn-primary w-100 theme-btn mx-auto">Add Exam Results</a>
                        </div>
                    </div>
                </div><!--//app-card-body-->
            </div><!--//app-card-->
    </div><!--//tab-content-->

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Exam Results For User: {{ $user->name }}</h1>
        </div>
        <div class="col-auto">
            <a class="btn-sm app-btn-secondary p-2" href="{{ route('admin.exams.create') }}">Add Exam Result</a>
        </div><!--//col-auto-->
    </div><!--//row-->



    <div class="tab-conten/t" id="orders-table-tab-content">
        {{-- <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab"> --}}
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>File</th>
                                    <th class="cell">Test</th>
                                    <th class="cell">Score</th>
                                    <th class="cell">Level</th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user->exams as $exam)
                                    <tr>
                                        <td class="cell">#{{ $exam->id }}</td>
                                         <td>
                                            <a href="{{ route('file.image',['filename'=>$user->file]) }}" target="_blank" class="image-larger"><img src="{{ asset('public/assets/images/pdf.png') }}" width="50px" height="50px" alt=""></a>
                                        </td>
                                        <td class="cell">{{ $exam->test }}</td>
                                        <td class="cell">{{ $exam->score }}</td>
                                        <td class="cell"><span>{{ $exam->level }}</span></td>
                                        <td class="cell">
                                            {{-- <a class="btn-sm app-btn-secondary" href="{{ route('admin.exams.show',['exam'=>$exam->id]) }}">View</a> --}}
                                            <a class="btn-sm app-btn-secondary" href="{{ route('admin.exams.edit',['exam'=>$exam->id]) }}">Edit</a>
                                            <button class="btn-sm app-btn-secondary text-danger" data-bs-toggle="modal" data-bs-target="#delExamModal{{ $exam->id }}" href="#">Delete</button>
                                        </td>

                                    </tr>
                                    <div class="modal fade" id="delExamModal{{ $exam->id }}" tabindex="-1" aria-labelledby="delExamModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <form action="{{ route('admin.exams.destroy',['exam'=>$exam->id]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="delExamModalLabel">
                                                    Delete Exam By User: {{ $exam->user->name }} ?
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <p>
                                                        Are you sure you want to delete exam done by: <b>{{ $exam->user->name }}</b>? This user and all related
                                                        information will be deleted.
                                                    </p>
                                                    <input type="hidden" value="{{ $exam->id }}" name="userId">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">
                                                        Yes, Delete
                                                    </button>
                                                </div>
                                            </form>
                                          </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td class="cell">No Exams Yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div><!--//table-responsive-->

                </div><!--//app-card-body-->
            </div><!--//app-card-->
    </div><!--//tab-content-->



</div><!--//container-fluid-->


@endsection
