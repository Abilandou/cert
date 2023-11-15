@extends('admin.layouts.app')
@section('title', 'Add New User')
@section('content')



<div class="container-xl">

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Update User</h1>
        </div>
        <div class="col-auto">
            {{-- <a class="btn-sm app-btn-secondary p-2" href="{{ route('admin.users.create') }}">Add New User</a> --}}
        </div><!--//col-auto-->
    </div><!--//row-->



    <div class="tab-conten/t" id="orders-table-tab-content">
        {{-- <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab"> --}}
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body p-2">

                    <form action="{{ route('admin.users.update',['user'=>$user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-sm-12 col-lg-3 col-md-4">
                                <label class="sr-only" for="signin-name">User Picture</label>
                                <img class="admin-profile-img w-100" id="preview" src="{{ $user->image ? route('user.image',['filename'=>$user->image]) : asset('public/assets/images/default.png') }}" alt="">
                                <input type="file" name="image" class="form-control cursor @error('image') is-invalid @enderror" onchange="previewImage(this)">
                            </div>

                            <div class="col-lg-8 col-sm-12 col-md-9">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="email mb-3">
                                            <label for="name">Name(Nom)</label>
                                            <input name="name" value="{{ old('name', $user->name) }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="email mb-3">
                                            <label for="first_name">First Name (PreNom)</label>
                                            <input name="first_name" type="text" value="{{ old('first_name', $user->first_name) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input name="email" type="email" value="{{ old('email', $user->email) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="phone">Phone</label>
                                            <input name="phone" value="{{ old('phone', $user->phone) }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="candidate_number">Candidate Number</label>
                                            <input name="candidate_number" value="{{ old('candidate_number', $user->candidate_number) }}" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="date_of_entry">Date of Entry</label>
                                            <input name="date_of_entry" type="date" value="{{ old('date_of_entry', $user->date_of_entry) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="code">Code</label>
                                            <input name="code" type="text" value="{{ old('code', $user->code) }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="mb-3">
                                            <label for="file">file</label>
                                            <a href="{{ route('file.image',['filename'=>$user->file]) }}" target="_blank" class="image-larger"><img src="{{ asset('public/assets/images/pdf.png') }}" width="50px" height="50px" alt=""></a>
                                            <input name="file" value="{{ old('file', $user->file) }}" type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Update User</button>
                            </div>
                        </div>
                    </form>

                </div><!--//app-card-body-->
            </div><!--//app-card-->
    </div><!--//tab-content-->



</div><!--//container-fluid-->


@endsection
@section('footer_script')

<script>
    function previewImage(input) {
        var file = input.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/jpg", "image/png"];
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
            $("#preview").attr('src', 'images/default.png');
            input.setAttribute("value", "");
        } else {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endsection
