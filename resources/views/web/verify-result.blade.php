@extends('web.app')
@section('title', 'Les résultats de vos tests')
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
            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"> <img class="result-img" src="{{ $user->image ? route('user.image',['filename'=>$user->image]) : asset('public/assets/front_assets/img/sample.png') }}" alt="Image Loading..."></a>
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

        <div class="d-flex justify-content-between">
            <div></div>
            <a  href="{{ route('file.image',['filename'=>$user->file]) }}" target="_blank" class="btn border">Imprimer</a>
        </div>


    </div>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Photo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="display: flex; justify-content: center;">
            <img class="result-img" src="{{ $user->image ? route('user.image',['filename'=>$user->image]) : asset('public/assets/front_assets/img/sample.png') }}" alt="Image Loading...">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>



  {{-- <button id="exportButton">Export to PDF</button> --}}

@endsection

