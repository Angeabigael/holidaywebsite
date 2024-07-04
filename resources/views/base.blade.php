<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')


    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('inscription.js')}}"></script>
</body>
</html>
