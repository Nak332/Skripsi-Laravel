<!DOCTYPE html>
<html lang="en">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Klinik Sehat - @yield('Title')</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
  @section('nav-bar')
    <div id="navbar">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center  mx-auto p-4">
              <!-- Reroute ke home -->
              <a href="" class="flex items-center pr-10">
                  <img src="{{ asset('storage/logo-rod.png') }}" class="h-10 mr-4" alt="Logo Klinik" />
                  <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Klinik Sehat</span>
              </a>
              <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
              </button>
              <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class=" self-centerfont-medium flex p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-10 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4  hover:bg-blue-500 text-transparent bg-clip-text transition-all duration-300 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Dashboard</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4  hover:bg-blue-500 text-transparent bg-clip-text transition-all duration-300 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" >Resepsi</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4  hover:bg-blue-500 text-transparent bg-clip-text transition-all duration-300 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Daftar Pasien</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4  hover:bg-blue-500 text-transparent bg-clip-text transition-all duration-300 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pengaturan</a>
                    </li>
                    <li>
                        <div class="container pl-80 mx-auto flex items-center">
                            <img src="{{ asset('storage/profile-icon.webp') }}" alt="Profile Picture" class="h-10 w-10 rounded-full mr-4">
                            <div>
                              <h1 class="text-xs font-bold text-white">Name</h1>
                              <p class="text-xs text-white">Title</p>
                            </div>
                          </div>
                    </li>

                </ul>
              </div>
            </div>
          </nav>
      </div>

      @yield('content')

        
</body>
</html>