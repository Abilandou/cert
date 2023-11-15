@extends('admin.layouts.app')
@section('title', 'Admin Dashboard')
@section('content')


<div class="container-xl">

    <h1 class="app-page-title">Dashboard</h1>

    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        <div class="inner">
            <div class="app-card-body p-3 p-lg-4">
                <h3 class="mb-3">Welcome, {{ Auth::guard('admin')->user()->name }}</h3>
                <div class="row gx-5 gy-3">
                    <div class="col-12 col-lg-9">

                        <div>The Test Verification Platform</div>
                    </div><!--//col-->

                </div><!--//row-->
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div><!--//app-card-body-->

        </div><!--//inner-->
    </div><!--//app-card-->

    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-4">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Total Users</h4>
                    <div class="stats-figure">
                        {{ count(\App\Models\User::all()) }}
                    </div>
                    <div class="stats-meta text-success">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                        </svg> 20%</div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
            </div><!--//app-card-->
        </div><!--//col-->

        <div class="col-6 col-lg-4">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Total Test Exams</h4>
                    <div class="stats-figure">
                        {{ count(\App\Models\Exam::all()) }}
                    </div>
                    <div class="stats-meta text-success">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                        </svg> 5% </div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
            </div><!--//app-card-->
        </div><!--//col-->
        <div class="col-6 col-lg-4">

        </div><!--//col-->
    </div><!--//row-->

</div><!--//container-fluid-->



@endsection
