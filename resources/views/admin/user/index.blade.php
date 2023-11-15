@extends('admin.layouts.app')
@section('title', 'Users')
@section('content')



<div class="container-xl">

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Users</h1>
        </div>
        <div class="col-auto">
            <a class="btn-sm app-btn-secondary p-2" href="{{ route('admin.users.create') }}">Add New User</a>
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
                                    <th class="cell">File</th>
                                    <th class="cell">Name</th>
                                    <th class="cell">Email</th>
                                    <th class="cell">Phone</th>
                                    <th class="cell">Date of Entry</th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="cell">#{{ $user->id }}</td>
                                        <td>
                                            <a href="{{ route('file.image',['filename'=>$user->file]) }}" target="_blank" class="image-larger"><img src="{{ asset('public/assets/images/pdf.png') }}" width="50px" height="50px" alt=""></a>
                                        </td>
                                        {{-- <td class="cell"><span class="truncate">Lorem ipsum dolor sit amet eget volutpat erat</span></td> --}}
                                        <td class="cell">
                                            <span>
                                                <a href="{{ route('user.image',['filename'=>$user->image]) }}" class="image-larger">
                                                    <img src="{{ route('user.image',['filename'=>$user->image]) }}" width="50px" height="50px" alt="image...">
                                                </a>
                                            </span>
                                            <span>{{ $user->name }}</span>
                                        </td>
                                        <td class="cell">{{ $user->email }}</td>
                                        <td class="cell">{{ $user->phone }}</td>
                                        <td class="cell"><span>{{ $user->date_of_entry }}</span></td>
                                        <td class="cell">
                                            <a class="btn-sm app-btn-secondary" href="{{ route('admin.users.show',['user'=>$user->id]) }}">View</a>
                                            <a class="btn-sm app-btn-secondary" href="{{ route('admin.users.edit',['user'=>$user->id]) }}">Edit</a>
                                            <button class="btn-sm app-btn-secondary text-danger" data-bs-toggle="modal" data-bs-target="#delUserModal{{ $user->id }}" href="#">Delete</button>
                                        </td>

                                    </tr>
                                    <div class="modal fade" id="delUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="delUserModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <form action="{{ route('admin.users.destroy',['user'=>$user->id]) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="delUserModalLabel">
                                                    Delete User: {{ $user->name }} ?
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <p>
                                                        Are you sure you want to delete user: <b>{{ $user->name }}</b>? This user and all related
                                                        information(such as loans, paymentscreenshots and more) will be deleted.
                                                    </p>
                                                    <input type="hidden" value="{{ $user->id }}" name="userId">
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
                                        <td class="cell">No User Yet</td>
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
