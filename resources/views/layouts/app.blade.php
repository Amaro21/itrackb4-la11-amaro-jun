<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1>Movie Flex</h1>
        <p >Prepaired by: Jun B. Amaro</p>

        @include('partials._nav')
        @if (session('success'))
            <div class="alert alert-success">{{ session('success')}}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
