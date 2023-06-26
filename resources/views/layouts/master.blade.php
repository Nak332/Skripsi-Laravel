<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Klinik Sehat - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('sweetalert::alert')
    <style>
        [x-cloak] { display: none !important; }
    </style>
    @livewireStyles
</head>

<body class="h-screen">
    @livewire('livewire-ui-modal')
    @livewireScripts

    {{-- @include('layouts.navigation-bar') --}}
    {{-- <div class="flex ">
        
        @include('layouts.side-navigation-bar') --}}
        <div class="flex-grow bg-gray-100">
            @yield('content')
        </div>

        
    {{-- </div> --}}
    

    
    
    

</body>


    @yield('footer')




</html>
