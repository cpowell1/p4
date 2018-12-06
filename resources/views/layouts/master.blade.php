<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>

    {{-- CSS global to every page can be loaded here --}}
    <link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" rel="stylesheet" crossorigin="anonymous">

    <link href='socialsetting.css' rel='stylesheet'>

    {{-- CSS specific to a given page/child view can be included via a stack --}}
    @stack('head')
</head>
<body>


<header>
   <h1>Social Setting | Nashville</h1>
    @include('modules.nav')
</header>

<section id='main'>
    @yield('content')
</section>

<footer class='clearfix'>
    <div class='social'>
        <h4>The Social Setting | Nashville </h4>
        <a href='http://instagram.com'><i class='fab fa-instagram'></i></a> |
        <a href='http://facebook.com'><i class='fab fa-facebook'></i></a> |
        <a href='http://twitter.com'><i class='fab fa-twitter'></i></a>
    </div>
    <div class='copy'>&copy; {{ date('Y') }}</div>
</footer>


@stack('body')

</body>
</html>