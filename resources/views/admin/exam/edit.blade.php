@extends('admin.layouts.app')
@section('title', 'Update Exam Result')
@section('content')



<div class="container-xl">

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Update Exam Result</h1>
        </div>
        <div class="col-auto">
            {{-- <a class="btn-sm app-btn-secondary p-2" href="{{ route('admin.exams.create') }}">Update User</a> --}}
        </div><!--//col-auto-->
    </div><!--//row-->



    <div class="tab-conten/t" id="orders-table-tab-content">
        {{-- <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab"> --}}
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-2">

                    <form action="{{ route('admin.exams.update',['exam'=>$exam->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="email mb-3">
                                    <label for="name">User</label>
                                    <select name="user_id" class="form-control">
                                        @forelse ($users as $user)
                                            <option value="{{ $user->id }}" @if($user->id === $exam->user->id) selected @endif >{{ $user->name }} {{ $user->first_name }}</option>
                                        @empty
                                            <option value="#">Nothing Yet</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="email mb-3">
                                    <label for="test">Test</label>
                                    <input name="test" value="{{ old('test', $exam->test) }}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="score">score</label>
                                    <input name="score" value="{{ old('score', $exam->score) }}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="level">Level</label>
                                    <input name="level" value="{{ old('level', $exam->level) }}" type="text" class="form-control">
                                </div>
                            </div>
                            
                            <div class="text-center mt-4">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Update Exam Result</button>
                            </div>
                        </div>
                    </form>

                </div><!--//app-card-body-->
            </div><!--//app-card-->
    </div><!--//tab-content-->



</div><!--//container-fluid-->


@endsection
