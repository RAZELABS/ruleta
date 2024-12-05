<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="" />
    <meta name="description" content="Ruleta-Falabella">
    <meta name="author" content="ZEUS COLMENARES">
    <title>Ruleta-Falabella</title>
    <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/_variables.css') }}">
    @include('frontend.layouts.ico')
    @vite(['resources/js/frontend.js'])
    @stack('styles')
</head>
<body>
    <img src="{{asset('frontend/img/elementos/1.png')}}" alt="girnalda" class="girnalda-1 overflow-hidden">
    <img src="{{asset('frontend/img/elementos/1.png')}}" alt="girnalda" class="girnalda-2 overflow-hidden">
    <img src="{{asset('frontend/img/elementos/1.png')}}" alt="girnalda" class="girnalda-3 overflow-hidden">
    {{-- <img src="{{asset('img/logos/Falabella-Logo.png')}}" alt="Logo" class="logo overflow-hidden"> --}}
    <div class="body">

        <div role="main" class="main" >
            @include('frontend.layouts.header')

                @yield('content')

            @include('frontend.layouts.footer')
        </div>

    </div>
    @if (session('success'))
    <x-alerts.swal-notification icon="success" title="Exito" text="{{session('message')}}" timer="3000" />
    @endif
    @if (session('error') || $errors->any())
    @php
    $errorText = session('error') ?? implode(', ', $errors->all());
    @endphp
    <x-alerts.swal-notification icon="error" title="Error" text="{{ $errorText }}" timer="3000" />
    @endif
    {{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/js/theme.js') }}"></script>
    <script src="{{ asset('frontend/js/view.contact.js') }}"></script>
    <script src="{{ asset('frontend/js/skin.js') }}"></script>
    <script src="{{ asset('frontend/js/theme.init.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/additional-methods.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/localization/messages_es_PE.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/init-validation.js') }}"></script>
    <script src="{{ asset('plugins/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>
