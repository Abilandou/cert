@extends('web.app')
@section('title', 'Bienvenue')
@section('content')


<div class="real-content">
    <div class="bg-img">
        {{-- <img src="{{ asset('public/front_assets/img/certbg.png') }}" alt=""> --}}
    </div>
    <div class="main-content">
        <a href="{{ route('verify.info') }}" class="btn btn-primary">
            Pour contrôler l'authenticité de l'attestation cliquez-ici.
        </a>
    </div>
</div>


@endsection
