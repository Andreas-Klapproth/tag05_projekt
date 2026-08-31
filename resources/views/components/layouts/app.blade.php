@props(['title' => 'Mein Projekt'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <link rel="stylesheet" href="{{ asset('styles/app.css') }}">
</head>
<body>

<x-navigation/>

<main>
    {{ $slot }}
</main>

<x-footer/>

</body>
</html>
