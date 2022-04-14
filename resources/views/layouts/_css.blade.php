@if (LaravelLocalization::getCurrentLocale() == 'en')
    <!-- Fonts CSS -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> --}}
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('ltr/css/feather.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('ltr/css/app-light.css') }}">
    <link rel="stylesheet" href="{{ asset('noty/themes/nest.css') }}">
    <link rel="stylesheet" href="{{ asset('noty/noty.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('rtl/css/app-rtl.css') }}"> --}}
@else
    <!-- Fonts CSS -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> --}}
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('rtl/css/feather.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('rtl/css/app-light.css') }}">
    <link rel="stylesheet" href="{{ asset('noty/themes/nest.css') }}">
    <link rel="stylesheet" href="{{ asset('noty/noty.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('rtl/css/app-rtl.css') }}"> --}}

    <style>
        .rtl .dropdown-menu-right .dropdown-item {
            text-align: right;
        }

    </style>
@endif
