<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Welkom | Antwerpen.be</title>

        <link rel="shortcut icon" href="/pictures/favicon/favicon-32x32.png" type="image/png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="/css/master.css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="/css/vertical-timeline-css.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
        <header>
            <div class="kaai-outer-container">
                <div class="logo-wrapper">
                    <a href="/">
                        <img src="/pictures/a-logo.svg" alt="a-logo" />
                    </a>
                </div>
                <div class="kaai-wrapper">
                    <div class="kaai-inner-container">
                        <div class="quick-menu">

                        </div>
                        <div class="action-wrapper">
                            <div class="kaai-core-wrapper">
                                <div class="domains-wrapper">

                                </div>
                                <div class="search-wrapper">
                                    <div class="search-desktop search-container">
                                        <div class="search-field-wrapper">
                                            <input id="searchField" type="text" placeholder="Wat wilt u vinden?" name>
                                        </div>
                                    </div>
                                    <div class="quick-menu">
                                        @if (Auth::guest())
                							<a href="/auth/register"><i class="fa fa-heart"></i>Registreren</a>
                							<a href="/auth/login"><i class="fa fa-sign-in"></i>Inloggen</a>
                						@else
                							<a href="/dashboard"><i class="fa fa-th"></i>Welkom, {{ Auth::user()->name }}</a>
                                            <a href="/auth/logout"><i class="fa fa-sign-out"></i>Afmelden</a>
                						@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container">
            @yield('content')
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>


        <script src="/js/masonry.min.js" charset="utf-8"></script>
        <script src="/js/modernizr.js" charset="utf-8"></script>
        <script src="/js/main.js" charset="utf-8"></script>


    </body>
</html>
