@extends('web.app')
@section('title', '404 Erruer')
@section('content')


<div class="real-content">
    <div class="bg-img">
        {{-- <img src="{{ asset('public/front_assets/img/certbg.png') }}" alt=""> --}}
    </div>
    <div class="main-content">
        <div class="p-5">
            <p>
                La ressource que vous recherchez est introuvable.
            </p>
        </div>
        <a href="{{ route('welcome') }}" class="btn btn-primary">
            Retour
        </a>
    </div>
</div>


@endsection
