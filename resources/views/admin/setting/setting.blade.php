@extends('admin.layouts.app')
@section('title', 'Admin Setting')
@section('content')


<div class="container-xl">

    <h1 class="app-page-title">Settings</h1>
    <div class="row gy-4">
        <div class="col-12 col-lg-6">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>
                            </div><!--//icon-holder-->
                        </div><!--//col-->
                        <div class="col-auto">
                            <h4 class="app-card-title">Setting</h4>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//app-card-header-->
                <div class="app-card-body px-4 w-100">
                    <div class="auth-form-container text-start">
						<form action="{{ route('admin.update.password') }}" method="POST" class="auth-form login-form">
                            @csrf
                            <div class="mb-4 col-lg-12 col-sm-12 col-md-12">
                                {{-- <div class="float-right pb-2" style="display: flex; flex-direction: flex-end; cursor: pointer;">
                                    <small class="cursor show-pass">show password</small>
                                    <small class="cursor hide-pass">hide password</small>
                                </div> --}}
                                <label class="text-secondary">Existing Password</label>
                                <input type="password" name="existing_password" id="oldpass" value="{{ old('existing_password') }}" class="form-control @error('existing_password') is-invalid @enderror" placeholder="Existing Password">
                                @error('existing_password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4 col-lg-12 col-sm-12 col-md-12">
                                <label class="text-secondary">New Password</label>
                                <input type="password" name="password" id="newpass" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="New Password">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4 col-lg-12 col-sm-12 col-md-12">
                                <label class="text-secondary">Confirm New Password</label>
                                <input type="password" name="password_confirmation" id="confirmpass" value="{{ old('password_confirmation') }}" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password Confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <button type="submit" class="btn btn-secondary">Change Password</button>
                            </div>
						</form>
					</div><!--//auth-form-container-->
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div><!--//col-->
    </div><!--//row-->

</div><!--//container-fluid-->


@endsection
@section('footer_script')
<script>
    $(function(){
        $(".hide-pass").hide();
        $(".show-pass").click(function(){
            $("#oldpass, #newpass, #confirmpass").attr('type', 'text');
            $(".show-pass").hide();
            $(".hide-pass").show();
        });
        $(".hide-pass").click(function(){
            $("#oldpass, #newpass, #confirmpass").attr('type', 'password');
            $(".show-pass").show();
            $(".hide-pass").hide();
        });
    });
</script>
@endsection
