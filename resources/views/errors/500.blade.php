@extends('web.app')
@section('title', '500 Erruer')
@section('content')


<div class="real-content">
    <div class="bg-img">
        {{-- <img src="{{ asset('public/front_assets/img/certbg.png') }}" alt=""> --}}
    </div>
    <div class="main-content">
        <div class="p-5">
            <p>
                Une erreur s'est produite, veuillez vous assurer que vous êtes connecté à Internet.
            </p>
        </div>
        <a href="{{ route('welcome') }}" class="btn btn-primary">
            Retour
        </a>
    </div>
</div>


@endsection
