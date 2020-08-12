<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Obce Slovenska, vyhľadávanie">
        <meta name="author" content="Slavka Ivanicova">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>Vyhľadávanie obcí</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- CSS -->
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            @include('partials.header')
        </div>

        <div class="content-box">
            @yield('content')
        </div>
        
        @include('partials.footer')

        <!-- Bootstrap, JavaScript, Jquery -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
    
    </body>
</html>
