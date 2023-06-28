<div id="navbar">
    <div class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
          <!-- Reroute ke home -->
          <a href="/db" class="flex items-center pr-10">
              <img src="{{ asset('storage/logo-rod.png') }}" class="h-10 mr-4" alt="Logo Klinik" />
              <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Klinik Sehat</span>
          </a>
          <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>

          </button>
          <div class="hidden w-full md:inline md:w-auto pt-3" id="navbar-default">
            <ul class="ml-auto flex items-center space-x-4">

                <li>
                    <div class="container mx-auto flex items-center">
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
                                class="max-w-xs hover:bg-gray-600 flex rounded-md items-center text-sm  text-white"
                            >
                            <a  class="px-4 py-2 rounded-md text-sm font-medium text-white hover:bg-gray-600" >Rekam Medis</a>




                            </button>

                            <!-- Panel -->
                            <div
                                x-ref="panel"
                                x-show="open"
                                x-transition.origin.top.left
                                x-on:click.outside="close($refs.button)"
                                :id="$id('dropdown-button')"
                                style="display: none;"
                                class="absolute left-0 mt-4 w-40 z-50 rounded-md bg-white shadow-md"
                            >
                            {{-- /profil-user/{{Auth::user()->employee_id}} --}}
                                <a href="/daftar-rekam" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                    Daftar Rekam Medis
                                </a>
                                <a href="/form-rekam/new" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                    Tambah Rekam Sakit
                                </a>

                                <a href="/tambah-vaksin/" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                     Tambah Rekam Vaksin
                                </a>



                            </div>
                        </div>
                      </div>
                    </li>

                <li>
                    <a href="/resepsi" class="px-4 py-2 rounded-md text-sm font-medium text-white hover:bg-gray-600" >Resepsi</a>
                </li>
                <li>
                    <a href="/daftar-pasien" class="px-4 py-2 rounded-md text-sm font-medium text-white hover:bg-gray-600">Pasien</a>
                </li>
                <li>
                    <a href="/daftar-transaksi" class="px-4 py-2 rounded-md text-sm font-medium text-white hover:bg-gray-600">Transaksi</a>
                </li>
                <li>
                    <a href="/daftar-obat" class="px-4 py-2 rounded-md text-sm font-medium text-white hover:bg-gray-600">e-Obat</a>
                </li>
                <li>
                    <a href="/daftar-karyawan" class="px-4 py-2 rounded-md text-sm font-medium text-white hover:bg-gray-600">Karyawan</a>
                </li>

              <li>
                <div class="container mx-auto flex items-center">
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
                            class="max-w-xs hover:bg-gray-600 flex rounded-md items-center text-sm  text-white"
                        >
                        @if (!Auth::check())
                        <div class="ml-2">
                            <h1 class="text-xs font-bold text-white pr-4">Name</h1>
                            <p class="text-xs text-white pr-4">Title</p>
                        </div>
                        <img src="{{ asset('images/profile-icon.webp') }}" alt="Profile Picture" class="h-10 w-10 rounded-full mr-4">
                        {{-- ^^^^^ nanti dihapus kalo udah jadi (buat test aja kalo ga ada user) atau header jangan dimunculin pas login --}}
                        @elseif (Auth::user()->role == 'admin')
                        <div class="ml-2">
                            <h1 class="text-xs font-bold text-white pr-4">{{Auth::user()->name}}</h1>
                            <p class="text-xs text-white pr-4">{{Auth::user()->role}}</p>
                        </div>
                        <img src="{{ asset('images/profile-icon.webp') }}" alt="Profile Picture" class="h-10 w-10 rounded-full mr-4"> {{--default photo--}}
                        @else

                        <div class="ml-2">
                            <h1 class="text-xs font-bold text-white pr-4">{{Auth::user()->Employee->employee_name}}</h1>
                            <p class="text-xs text-white pr-4">{{Auth::user()->role}}</p>
                        </div>
                        <img src="{{ asset("images/" . Auth::user()->Employee->employee_photo) }}" alt="Profile Picture" class="h-10 w-10 rounded-full mr-4">
                        @endif


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
                            class="absolute left-0 mt-4 w-40 z-50 rounded-md bg-white shadow-md"
                        >
                        {{-- /profil-user/{{Auth::user()->employee_id}} --}}
                            <a href="/profil-user" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                Profil
                            </a>

                            

                            <form action="/logout" method="post">
                                @csrf
                                <button class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                    <span class="text-red-600">Log Out</span>
                                </button>
                            </form>

                        </div>
                    </div>
                  </div>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

