<?php $local= Config::get('app.locale') ?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_base_url" content="{{ url('/') }}">
    <meta name="viewport" content="width=1188" />
    <meta name="keywords" content="Collectorate" />

    <link href='/img/{{$favicon}}' rel='shortcut icon' type='image/x-icon' />
    <link href='{{ asset("img/".$logo) }}' rel='apple-touch-icon-precomposed'/>
    <link href='{{ asset("img/".$logo) }}' sizes='114x114' rel='apple-touch-icon-precomposed'/>
    <link href='{{ asset("img/".$logo) }}' sizes='72x72' rel='apple-touch-icon-precomposed'/>
    <link href='{{ asset("img/".$logo) }}' sizes='144x144' rel='apple-touch-icon-precomposed'/>
    <meta property="og:title" content="CPSCN Routine System" />
    <meta property="og:description" content="Collectorate Public School & College, Nilphamari" />
    <meta property="og:image" content="/img/{{$og_banner}}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-touch-slider.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="@yield('body-class')">
    {{-- <div class="loading">Loading&#8230;</div> --}}
    {{-- include header --}}
    @include('includes.header')
    @auth('web')
    @include('includes.navHeader')
    @endauth 
    {{-- loading page content --}}
    @yield('content')
    {{-- end of page content --}}
    {{-- footer --}}
    {{-- @include('includes.footer') --}}
    {{-- end of footer --}}
    {{-- loading javascript resources --}}
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.13.2/TweenMax.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fontawesome.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-touch-slider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session()->has('success'))
    <script>swal("Thank you!", "{{session()->get('success')}}", "success")</script>
    @endif
    @if(session()->has('failed'))
    <script>swal("Failed!", "{{session()->get('failed')}}", "error")</script>
    @endif
    @if(session()->has('logout'))
    <script>swal("Logged Out!", "{{session()->get('logout')}}", "success")</script>
    @endif
    @if ($errors->any())
    <script>swal("Failed!", "@foreach($errors->all() as $message)\n {{$message}}\n @endforeach", "error")</script>
    @endif
</body>
</html>