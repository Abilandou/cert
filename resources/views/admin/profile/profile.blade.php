@extends('admin.layouts.app')
@section('title', 'Admin Profile')
@section('content')


<div class="container-xl">

    <h1 class="app-page-title">My Profile</h1>
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
                            <h4 class="app-card-title">Profile</h4>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//app-card-header-->
                <div class="app-card-body px-4 w-100">

                    <div class="auth-form-container text-start">
						<form action="{{ route('admin.update.profile') }}" method="POST" class="auth-form login-form">
                            @csrf
                            <div class="name mb-3">
								<label class="sr-only" for="signin-name">name</label>
								<input id="signin-name" name="name" type="text" value="{{ $admin->name }}" class="form-control signin-name @error('name') is-invalid @enderror" placeholder="name" required="required">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
							</div><!--//form-group-->
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input id="signin-email" name="email" type="email" value="{{ $admin->email }}" class="form-control signin-email @error('email') is-invalid @enderror" placeholder="Email address" required="required">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
							</div><!--//form-group-->
                            <div class="phone mb-3">
								<label class="sr-only" for="signin-phone">Phone</label>
								<input id="signin-phone" name="phone" type="phone" value="{{ $admin->phone }}" class="form-control signin-phone @error('phone') is-invalid @enderror" placeholder="phone" required="required">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Update Profile</button>
							</div>
						</form>
					</div><!--//auth-form-container-->
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div><!--//col-->
    </div><!--//row-->

</div><!--//container-fluid-->


@endsection
