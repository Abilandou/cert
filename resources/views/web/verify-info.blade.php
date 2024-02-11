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
                    <form action="{{ route('result.info') }}" id="resultForm" method="GET">
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
                                    <input type="text" id="inputValue" required placeholder="Somme en Chiffres" class="form-control">
                                    <span class="error-input" style="color: #c20707;"></span>
                                </div>
                            </div>

                            <div class="mt-2">
                            <button id="mainSubmitBtn" class="btn btn-primary" type="button">
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
    $("#mainSubmitBtn").click(function(){
        const src = $(".captcha-img").attr("src");
        const imageName = parseInt(src.match(/\w+(?=\.png$)/)[0]);
        const inputValue = parseInt($("#inputValue").val());
        // alert(jQuery.type(inputValue));
        // return;
        if(imageName === inputValue){
            $("#resultForm").submit();
            return;
        }else{
            // alert("Veuillez saisir la somme des deux nombres en chiffres");
            $(".error-input").html("Veuillez saisir la somme des deux nombres en chiffres !");
            return;
        }

    })
</script>

<script>

    (function($){

    $.fn.recaptcha = function(options) {

        //Random Recaptcha Images
        var randomImageArr = ["{{ asset('public/assets/images/7.png') }}", "{{ asset('public/assets/images/30.png') }}", "{{ asset('public/assets/images/17.png') }}",
                            "{{ asset('public/assets/images/13.png') }}", "{{ asset('public/assets/images/4.png') }}", "{{ asset('public/assets/images/9.png') }}",
                            "{{ asset('public/assets/images/26.png') }}", "{{ asset('public/assets/images/14.png') }}", "{{ asset('public/assets/images/12.png') }}",
                            "{{ asset('public/assets/images/25.png') }}", "{{ asset('public/assets/images/6.png') }}",
                            "{{ asset('public/assets/images/11.png') }}", "{{ asset('public/assets/images/18.png') }}",
                            "{{ asset('public/assets/images/28.png') }}", "{{ asset('public/assets/images/23.png') }}", "{{ asset('public/assets/images/19.png') }}",
                            "{{ asset('public/assets/images/1.png') }}", "{{ asset('public/assets/images/15.png') }}", "{{ asset('public/assets/images/20.png') }}"
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


