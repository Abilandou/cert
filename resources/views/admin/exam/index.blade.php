@extends('admin.layouts.app')
@section('title', 'Exam Results')
@section('content')



<div class="container-xl">

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Exam Results</h1>
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
                                    <th class="cell">User</th>
                                    <th class="cell">Test</th>
                                    <th class="cell">Score</th>
                                    <th class="cell">Level</th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($exams as $exam)
                                    <tr>
                                        <td class="cell">#{{ $exam->id }}</td>
                                        
                                        {{-- <td class="cell"><span class="truncate">Lorem ipsum dolor sit amet eget volutpat erat</span></td> --}}
                                        <td class="cell">
                                            <a href="{{ route('admin.users.show',['user'=>$exam->user->id]) }}">
                                                <img src="{{ route('user.image',['filename'=>$exam->user->image]) }}" width="50px" height="50px" alt="image...">
                                                <span>{{ $exam->user->name }}</span>
                                            </a>
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
