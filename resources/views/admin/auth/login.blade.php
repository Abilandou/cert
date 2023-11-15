<!DOCTYPE html>
<html lang="en">
<head>
    <title>Certification - Admin Login</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Loan - Admin Login">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('public/assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('public/assets/css/portal.css') }}">

</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="{{ route('welcome') }}"><img class="logo-icon me-2" src="{{ asset('public/assets/images/icon.png') }}" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">EXAM TEST PLATFORM</h2>
                    <h6>Administrator Login</h6>
			        <div class="auth-form-container text-start">
						<form action="{{ route('admin.login') }}" method="POST" class="auth-form login-form">
                            @csrf
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input id="signin-email" name="email" type="email" class="form-control signin-email @error('email') is-invalid @enderror" placeholder="Email address" required="required">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" name="password" type="password" class="form-control signin-password @error('password') is-invalid @enderror" placeholder="Password" required="required">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
							</div>
						</form>
					</div><!--//auth-form-container-->
			    </div><!--//auth-body-->


		    </div><!--//flex-column-->
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Exam Check Platform</h5>
					    <div>Exam Check Platform for users.</div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->

    </div><!--//row-->


</body>
</html>

