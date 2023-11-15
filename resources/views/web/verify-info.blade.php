@extends('web.app')
@section('title', 'Commencez à vérifier vos informations')
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
            <div class="col-lg-6 col-md-12 col-sm-12 someBox">
                <h6>Consultation et vérification des résultats d'une attestation du TCF</h6>
                <div class="card mt-4">
                    <div class="card-header">
                        Renseignez les informations présentes sur l'attestation
                    </div>
                    <form action="{{ route('result.info') }}" method="GET">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <small><b> Numéro d'attestation </b></small>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" required name="code" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <small><b>  Date de la session  </b></small>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <input type="date" required name="date" class="form-control">
                                </div>
                            </div>

                            <div class="alert-box p-3 mt-3" style="background-color: #5e9cfa77; border-radius: 5px;">
                                <span class="fa fa-question-circle"></span>
                                <span><b class="text-primary">Où trouvez le numéro d'attestation et la date de session ?</b></span>
                                <p>
                                    <small class="text-primary">Attention, pour le numéro d'attestation, vous ne devez saisir que la partie qui se trouve après le dernier tiret ("-").</small>
                                </p>
                                <p>
                                    <ul>
                                        <li>
                                            <a target="_blank" class="main-link" href="https://controle.france-education-international.fr/images/exemple-attestationdemat.png">
                                                <small class="text-primary-light">Cliquez ici pour voir où se trouve le numéro d'attestation et la date de session sur l'attestation dématérialisée </small>
                                            </a>
                                        </li>
                                    </ul>
                                </p>
                            </div>

                            <div class="row mt-2">

                                <div>
                                <img src="{{ asset('public/assets/images/captcha.png') }}" class="captcha-img" alt="">
                                </div>

                                <small><b> Saisissez la somme des deux nombres en chiffres </b></small>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <input type="text" required placeholder="Somme en Chiffres" class="form-control">
                                </div>
                            </div>

                            <div class="mt-2">
                            <button class="btn btn-primary" type="submit">
                                <span class="fa fa-search text-white"></span>
                                <span> Rechercher l'attestation</span>
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection
@section('footer_script')


<script>
    (function($){

    $.fn.recaptcha = function(options) {

        //Random Recaptcha Images
        var randomImageArr = ["{{ asset('public/assets/images/captcha2.png') }}", "{{ asset('public/assets/images/captcha3.png') }}", "{{ asset('public/assets/images/captcha4.png') }}",
                            "{{ asset('public/assets/images/captcha5.png') }}", "{{ asset('public/assets/images/captcha6.png') }}", "{{ asset('public/assets/images/captcha7.png') }}",
                            "{{ asset('public/assets/images/captcha8.png') }}", "{{ asset('public/assets/images/captcha9.png') }}", "{{ asset('public/assets/images/captcha10.png') }}",
                            "{{ asset('public/assets/images/captcha11.png') }}", "{{ asset('public/assets/images/captcha12.png') }}", "{{ asset('public/assets/images/captcha13.png') }}",
                            "{{ asset('public/assets/images/captcha14.png') }}", "{{ asset('public/assets/images/captcha15.png') }}", "{{ asset('public/assets/images/captcha16.png') }}",
                            "{{ asset('public/assets/images/captcha17.png') }}", "{{ asset('public/assets/images/captcha18.png') }}", "{{ asset('public/assets/images/captcha19.png') }}",
                            "{{ asset('public/assets/images/captcha20.png') }}", "{{ asset('public/assets/images/captcha21.png') }}", "{{ asset('public/assets/images/captcha22.png') }}",
                            "{{ asset('public/assets/images/captcha23.png') }}"
                        ];

        var randomImage = randomImageArr[Math.floor(Math.random() * randomImageArr.length)];

        var settings = $.extend({
            src: randomImage,
        }, options);

        return this.attr({
            src: settings.src,
        })
    }

}(jQuery));

    $(".captcha-img").recaptcha();

</script>


@endsection


