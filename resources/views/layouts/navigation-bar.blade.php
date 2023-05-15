<div id="navbar">
    <div class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center  mx-auto p-4">
          <!-- Reroute ke home -->
          <a href="" class="flex items-center pr-10">
              <img src="{{ asset('storage/logo-rod.png') }}" class="h-10 mr-4" alt="Logo Klinik" />
              <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Klinik Sehat</span>
          </a>
          <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>

          </button>
          <div class="hidden w-full md:inline md:w-auto pt-3" id="navbar-default">
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
                  <div class="flex justify-center">
                    <div
                        x-data="{
                            open: false,
                            toggle() {
                                if (this.open) {
                                    return this.close()
                                }
                 
                                this.$refs.button.focus()
                 
                                this.open = true
                            },
                            close(focusAfter) {
                                if (! this.open) return
                 
                                this.open = false
                 
                                focusAfter && focusAfter.focus()
                            }
                        }"
                        x-on:keydown.escape.prevent.stop="close($refs.button)"
                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                        x-id="['dropdown-button']"
                        class="relative"
                    >
                        <!-- Button -->
                        <button
                            x-ref="button"
                            x-on:click="toggle()"
                            :aria-expanded="open"
                            :aria-controls="$id('dropdown-button')"
                            type="button"
                            class="block py-2 pl-3 pr-4  hover:bg-blue-500 text-transparent bg-clip-text transition-all duration-300 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                        >
                        
                        <img src="{{ asset('storage/profile-icon.webp') }}" alt="Profile Picture" class="h-10 w-10 rounded-full mr-4">
                        
                          <h1 class="text-xs font-bold text-white pr-4">Name</h1>
                          <p class="text-xs text-white pr-4">Title</p>
                        
                        <div>
                          
                        </div>
                 
                        </button>
                 
                        <!-- Panel -->
                        <div
                            x-ref="panel"
                            x-show="open"
                            x-transition.origin.top.left
                            x-on:click.outside="close($refs.button)"
                            :id="$id('dropdown-button')"
                            style="display: none;"
                            class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md"
                        >
                            <a href="#" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                Profile
                            </a>
                 
                            <a href="#" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                Settings
                            </a>
                 
                            <a href="#" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                <span class="text-red-600">Log Out</span>
                            </a>
                        </div>
                    </div>
                  </div>
            </li>
            </ul>
          </div>
        </div>
      </div>
  </div>

