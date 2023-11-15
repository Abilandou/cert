@extends('web.app')
@section('title', 'Welcome')
@section('content')


<div class="real-content">
    <div class="bg-img">
        {{-- <img src="{{ asset('public/front_assets/img/certbg.png') }}" alt=""> --}}
    </div>
    <div class="main-content">
        {{-- <a href="#" class="btn btn-primary">
            Pour contrôler l'authenticité de l'attestation cliquez-ici.
        </a> --}}
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h5 class="text-primary result-head">Consultation et vérification des résultats du TCF</h5>
                <div class="bg-warning p-3" style="border-radius: 5px; color: #664d03;">
                    Résultats pour le « <b>TCF Canada - Test de connaissance du français pour le Canada </b> » du <b>{{ \Carbon\Carbon::parse($user->date_of_entry)->format('d/m/Y') }}</b> pour le candidat n°<b>{{ $user->candidate_number }}</b>. <br>
                    <span>Nom : <b class="text-uppercase">{{ $user->name }}</b> </span><br>
                    <span> Prénom : <b class="text-uppercase">{{ $user->first_name }}</b> </span>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12 col-md-2 col-lg-2 result-img-div">
                <img class="result-img" src="{{ $user->image ? route('user.image',['filename'=>$user->image]) : asset('public/assets/front_assets/img/sample.png') }}" alt="Image Loading...">
            </div>
            <div class="col-sm-12 col-md-10 col-lg-10">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table">
                        <thead>
                            <tr>
                                <th  style="background-color: #dddcdc62;">Épreuve</th>
                                <th style="background-color: #dddcdc62;">Score/Note</th>
                                <th style="background-color: #dddcdc62;">Niveau CECR</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user->exams as $exam)
                                <tr>
                                    <td>{{ $exam->test }}</td>
                                    <td>{{ $exam->score }}</td>
                                    <td>{{ $exam->level }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <p>
                                            Aucun résultat d'examen pour l'utilisateur : <b>{{ $user->name }} {{ $user->first_name }}</b> pour le moment.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


    </div>
</div>


@endsection
