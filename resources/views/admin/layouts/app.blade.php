<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cert - @yield('title')</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Loan - @yield('title')">
    <link rel="icon" href="{{ asset('public/assets/images/icon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugins/toastr/build/toastr.min.css') }}">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('public/assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('public/assets/css/portal.css') }}">

</head>

<body class="app">
    <header class="app-header fixed-top">
        <div class="app-header-inner">
            @include('admin.layouts.header')
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel">
            @include('admin.layouts.sidebar')
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->

    <div class="app-wrapper">

	    <div class="app-content pt-3 p-md-3 p-lg-4">

            @yield('content')

	    </div><!--//app-content-->

	    <footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            {{-- <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small> --}}
		    </div>
	    </footer><!--//app-footer-->

    </div><!--//app-wrapper-->


    <!-- Javascript -->
    <script src="{{ asset('public/assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('public/assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/index-charts.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/toastr/build/toastr.min.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('public/assets/js/app.js') }}"></script>
    @yield('footer_script')

    <script>
        $(function() {
            $('.image-larger').magnificPopup({
                type: 'iframe'
            })
        });
    </script>


</body>
</html>

