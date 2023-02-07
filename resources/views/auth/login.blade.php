<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="robot" content="index, follow" />
    <meta name="generator" content="Brackets">
    <meta name='copyright' content='Orange Technology Solution co.,ltd.'>
    <meta name='designer' content='Kamonluk'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <title>ArtSimple</title>

    <link type="image/ico" rel="icon" href="images/DSPM Logo.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <!--JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous">
    </script>

    <!--FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mitr:wght@300;400;500;600&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!--ICON-->
    <link rel="stylesheet" href="{{ asset('fontawesome/all.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--FANCY APP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>

    <!--Owl Carousel-->
    <link rel="stylesheet" href="{{ asset('owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/css/owl.theme.default.min.css') }}">
    <script src="{{ asset('owlcarousel/js/owl.carousel.min.js') }}"></script>
    <!--Virtual-select-->
    <link href="{{ asset('dist/virtual-select.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('dist/virtual-select.min.js') }}"></script>
    <!--Animation-->
    <script src="{{ asset('js/wow.min.js') }}"></script>

    <script>
        new WOW().init();
    </script>

    @include('layouts.stylesheet')

</head>
<style>
    .mt-custom{
        margin-top: 1rem;
    }
</style>

<body>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <section id="login">
            <div class="form-login">
                <img src="images/logo3.png" class="logo">
                <h2 class="my-5">LOGIN</h2>
                <div class="input-group mb-4">
                    <div class="input-group-text bg-white ">
                        <i class="far fa-user fs-20"></i>
                    </div>

                    <input id="email" type="email" placeholder="Email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- <input type="text" class="form-control" placeholder="Username"> --}}
                </div>
                <div class="input-group mb-4">
                    <div class="input-group-text bg-white">
                        <img src="images/icons8-lock.svg" class="img-icon">
                    </div>
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    {{-- <input type="text" class="form-control" placeholder="Password"> --}}
                </div>
                <div class="text-end">
                    {{-- <a href="" class="btn">Forgot password?</a> --}}
                    @if (Route::has('password.request'))
                        <a class="btn" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <button type="submit" class="btn btn-black mt-5">
                    Log in
                </button>
                {{-- <a href="{{ route('register') }}" class="btn btn-black mt-custom">Register</a> --}}

                {{-- <a href="" class="btn btn-black mt-5">Log in</a> --}}

            </div>
        </section>
    </form>


</body>

<script src="{{ asset('js/jquery.min.js') }}"></script>
{{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script> --}}

<script>
    // to top
    $(window).scroll(function() {
        if ($(this).scrollTop()) {
            $("#toTop").fadeIn();
        } else {
            $("#toTop").fadeOut();
        }
    });
    $("#toTop").click(function() {
        $("html, body").animate({
                scrollTop: 0,
            },
            1800
        );
    });
</script>

<script>
    function reveal() {
        var reveals = document.querySelectorAll(".reveal");

        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            } else {
                reveals[i].classList.remove("active");
            }
        }
    }

    window.addEventListener("scroll", reveal);
</script>

<script>
    window.addEventListener('DOMContentLoaded', event => {

        // Toggle the side navigation
        const sidebarToggle = document.body.querySelector('#sidebarToggle');
        if (sidebarToggle) {
            // Uncomment Below to persist sidebar toggle between refreshes
            // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            //     document.body.classList.toggle('sb-sidenav-toggled');
            // }
            sidebarToggle.addEventListener('click', event => {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains(
                    'sb-sidenav-toggled'));
            });
        }

    });
</script>

</html>


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
