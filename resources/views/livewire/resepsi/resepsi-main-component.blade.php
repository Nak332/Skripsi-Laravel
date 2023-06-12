<div id="container-main" class="flex-inline bg-gray-200 min-h-screen">

    <div id="header-page" x-data="{ expanded: false }" @click="expanded = !expanded"  @click.outside="expanded = false" class="flex justify-center">

      <div class="md:flex " >
            <div x-show="expanded"  x-collapse class="flex {{$current_patient ? 'hidden' : ''}}">
                @if ($appointment)
                <button  x-on:click="$wire.undo(id='{{$appointment->id}}')" wire:click="$refresh()"  title="Kembalikan pasien sebelumnya" class="w-20 h-20 items-center bg-yellow-300 rounded-lg text-xl font-bold items-center p-4 ml-4 mt-6 drop-shadow-md  outline-offset-1 ">
                    {{-- <x-tabler-arrow-back-up class="w-12 h-12 "/> --}}
                    {{-- <p class="text-md ml-1">Pasien Sebelumnya</p> --}}
                    <x-fas-undo class="w-3/4 h-3/4" />
                </button>
                @endif


            </div>



        <div  x-transition id="current queue"  class="drop-shadow flex text-center   text-black  m-4 rounded-lg text-4xl w-128 h-fit">
          {{-- <p class="">Antrian sekarang:</p> --}}




          <p x-transition id="card_pasien_sekarang"  class="font-bold bg-blue-500 rounded-lg mt-2 p-5 truncate text-white">

            @if ($current_patient && $appointment)
                @if ($appointment->appointment_type=='on_the_spot')
                  A
                  @else
                  J
                  @endif
                  {{$appointment->antrian_number}} {{$appointment->patient->patient_name}}
            @elseif ($current_patient == NULL && $appointment != NULL)

                  @if ($appointment->appointment_type=='on_the_spot')
                  A
                  @else
                  J
                  @endif
                  {{$appointment->antrian_number}} {{$appointment->patient->patient_name}}
            @else
                    Kosong
            @endif

          </p>






          </div>





      </div>




    </div>




    <div id="container-items-atas" class=" ml-16 mr-16 xl:flex md:flex-inline justify-center h-fit">
      @if ($history and $antrian)
        @livewire('antrian-list',['antrian'=>$antrian,'history'=>$history,'q_type'=>'on_the_spot'])
      @endif

      @livewire('antrian-list',['antrian'=>$antrian,'history'=>$history,'q_type'=>'scheduled'])
    </div>

    {{-- ///////////////////////////////////// Container Bawah //////////////////////////////////////--}}
    <div id="container-items-atas" class="md:flex sm:flex-inline ml-16 mr-16  justify-center space-x-4 content h-fit">
        {{-- @livewire('antrian-list') --}}
      <div id="filler" class="flex-inline self-center p-8 w-4/5 h-fit sm:hidden ">
      </div>




    </div>
</div>
