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

<body class="relative min-h-full">
    @livewire('livewire-ui-modal')
    @livewireScripts

    <div class="fit-content">
        @yield('content')
    </div>
    
    

</body>



<footer class="relative dark:bg-gray-900 bottom-0 w-full mt-auto">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="/" class="flex items-center mb-4 sm:mb-0">
                 <img src="{{ asset('storage/logo-rod.png') }}" class="h-10 mr-4" alt="Logo Klinik" />
                <span class="self-center text-2xl font-semibold  dark:text-white">Klinik Sehat</span>
            </a>
           
        </div>
        
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a  class="hover:underline">AMG™</a>. All Rights Reserved.</span>
    </div>
</footer>




</html>
