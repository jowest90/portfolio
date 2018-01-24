<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Portfolio forum</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">

</head>
<body>
    <div id="app">
      @include('layouts.inc.navbar')

        @yield('content')
    </div>

</body>
</html>
