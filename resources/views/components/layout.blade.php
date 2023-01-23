<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery-3.6.0.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>
<body class="antialiased">
<nav class="navbar navbar-expand-sm">
    <div class="px-4 d-flex justify-content-between w-100" id="mynavbar">
        @auth
            <a href="/dashboard" class="home_dash fs-3 fw-bold ">Dashboard</a>
            <form method="post" action="/logout">
                @csrf
                <button class="btn btn-outline-secondary" type="submit">Logout</button>
            </form>
        @else
            <a href="/" class="home_dash fs-3 fw-bold ">Home</a>
            <div>
                <a class="btn btn-outline-success" href="/login">Login</a>
                <a class="btn btn-outline-success" href="/register">Register</a>
            </div>
        @endauth
    </div>
</nav>
    @yield('content')
@if(session()->has('success'))
    <div id="success" class="session-success">
        <p class="text-bold m-0">{{session('success')}}</p>
    </div>
    <script>
        setTimeout(function () {
            $("#success").css('display','none');
        }, 6000);
    </script>
@endif
<div id="message" class="d-none"></div>
<script>
    function demoFromHTML() {
        var pdf = new jsPDF('p', 'pt', 'letter');

        margins = {
            top:20,
            bottom:20,
            left: 20,
            width: 800
        };
        html2pdf($('#resume').get(0), {
            margin:       1,
            filename:     'Resume.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { dpi: 192, letterRendering: true },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        },
            function (dispose) {
                pdf.save(filename);
            },
            margins
        );
    }
</script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
