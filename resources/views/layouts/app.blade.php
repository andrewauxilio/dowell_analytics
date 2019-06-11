<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dowell Windows') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

<style>

@import url(https://fonts.googleapis.com/css?family=Nunito:200,600);
/* Background data (Original source: https://subtlepatterns.com/grid-me/) */
/* Animations */

@-webkit-keyframes bg-scrolling-reverse {
  100% {
    background-position: 50px 50px;
  }
}
@-moz-keyframes bg-scrolling-reverse {
  100% {
    background-position: 50px 50px;
  }
}
@-o-keyframes bg-scrolling-reverse {
  100% {
    background-position: 50px 50px;
  }
}
@keyframes bg-scrolling-reverse {
  100% {
    background-position: 50px 50px;
  }
}
@-webkit-keyframes bg-scrolling {
  0% {
    background-position: 50px 50px;
  }
}
@-moz-keyframes bg-scrolling {
  0% {
    background-position: 50px 50px;
  }
}
@-o-keyframes bg-scrolling {
  0% {
    background-position: 50px 50px;
  }
}
@keyframes bg-scrolling {
  0% {
    background-position: 50px 50px;
  }
}
/* Main styles */


@media only screen and (min-width: 768px) {
    body {
        margin-top: 7.5rem;
        color: #999;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        text-align: center;
        /* img size is 50x50 */
        background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAIAAACRXR/mAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAABnSURBVHja7M5RDYAwDEXRDgmvEocnlrQS2SwUFST9uEfBGWs9c97nbGtDcquqiKhOImLs/UpuzVzWEi1atGjRokWLFi1atGjRokWLFi1atGjRokWLFi1af7Ukz8xWp8z8AAAA//8DAJ4LoEAAlL1nAAAAAElFTkSuQmCC") repeat 0 0;
        -webkit-animation: bg-scrolling-reverse .92s infinite;
        /* Safari 4+ */
        -moz-animation: bg-scrolling-reverse .92s infinite;
        /* Fx 5+ */
        -o-animation: bg-scrolling-reverse .92s infinite;
        /* Opera 12+ */
        animation: bg-scrolling-reverse .92s infinite;
        /* IE 10+ */
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
        -o-animation-timing-function: linear;
        animation-timing-function: linear;
    }
    body::before {
        content: "Dowell Windows";
        font-size: 5rem;
        font-weight: 100;
        font-style: normal;
    }
}

@media only screen and (max-width: 767px) {
    body {
        margin-top: 1rem;
        color: #999;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        text-align: center;
        /* img size is 50x50 */
        background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAIAAACRXR/mAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAABnSURBVHja7M5RDYAwDEXRDgmvEocnlrQS2SwUFST9uEfBGWs9c97nbGtDcquqiKhOImLs/UpuzVzWEi1atGjRokWLFi1atGjRokWLFi1atGjRokWLFi1af7Ukz8xWp8z8AAAA//8DAJ4LoEAAlL1nAAAAAElFTkSuQmCC") repeat 0 0;
        -webkit-animation: bg-scrolling-reverse .92s infinite;
        /* Safari 4+ */
        -moz-animation: bg-scrolling-reverse .92s infinite;
        /* Fx 5+ */
        -o-animation: bg-scrolling-reverse .92s infinite;
        /* Opera 12+ */
        animation: bg-scrolling-reverse .92s infinite;
        /* IE 10+ */
        -webkit-animation-timing-function: linear;
        -moz-animation-timing-function: linear;
        -o-animation-timing-function: linear;
        animation-timing-function: linear;
    }
    body::before {
        content: "Dowell Windows";
        font-size: 2.5rem;
        font-weight: 100;
        font-style: normal;
    }
}

</style>
