<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Klinik Sehat - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
    </style>
    @livewireStyles
</head>

<body>
   
   
    @livewireScripts
    @yield('content')
    @livewire('livewire-ui-modal')
    @extends('layouts.footer')

</body>



</html>
