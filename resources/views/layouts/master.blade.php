<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- [Favicon] --}}
    <link rel="shortcut icon" href="{{ asset('image/logo.png') }}" type="image/png">
    {{-- [Favicon] --}}
    
    {{-- [CSS] --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- [CSS] --}}

    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        @if (Session::has('success'))
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center white-box" id="alert-msg" title="click to close">
                    <p class="hint">{{ Session::get('success') }}</p>
                </div>
                <div class="col-md-4"></div>
            </div>
        @endif

        @section('container')
        
        @show    

        <footer class="row text-center">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                <p class="copyrights">&copy; LinearChat {{ date('Y') }}</p>
            </div>
            <div class="col-md-4"></div>
        </footer>
    </div>
    
    {{-- [JS] --}}
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-1.10.0.min.js') }}"></script>
    <script src="{{ asset('js/vue.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    {{-- [JS] --}}
</body>
</html>