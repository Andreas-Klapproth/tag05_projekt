<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('styles/app.css')}}">

    <title>{{ $title }}</title>

<body>
<x-navigation/>

{{ $slot }}
<x-footer/>
</body>
</html>
