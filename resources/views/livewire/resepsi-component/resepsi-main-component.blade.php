<div id="container-main" class="flex-inline bg-gray-200 min-h-screen">

    <div id="header-page"  class="flex justify-center">

      <div class="md:flex truncate md:w-2/5 " >
        <div  x-data="{ expanded: false }" @click="expanded = !expanded"  @click.outside="expanded = false" id="current queue"  class=" my-4 drop-shadow text-center min-w-full text-gray-700 rounded-lg text-2xl h-fit">
          {{-- <p class="">Antrian sekarang:</p> --}}
          <p  class="pb-1 pt-2 ">
            Nomor Antrian :
          </p>
          



          <p x-transition id="card_pasien_sekarang"  class="font-bold bg-green-500 rounded-tl rounded-tr mt-2 text-4xl p-5 truncate text-white">

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

            @if ($appointment)
            <div x-show="expanded" x-collapse  id="info pasien" class="text-start text-white items-center text-sm p-2 flex bg-gray-500  rounded-bl rounded-br">
            
              <div 
              x-on:click="$wire.undo(id='{{$appointment->id}}')"
               wire:click="$refresh()" 
               class="cursor-pointer w-12 h-12 rounded bg-yellow-400 flex items-center  justify-center">
                <x-fas-undo class="w-1/2 h-1/2" />
              </div>
              
              
              <div class="pl-4 w-full max-w-lg">
                <div class="font-bold">Alamat :</div>
                {{$appointment->patient->patient_address}}
                {{-- <div class="truncate overflow-auto"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, molestiae qui sapiente velit rem iusto sunt exercitationem error libero, rerum deleniti obcaecati et animi doloremque ullam molestias quibusdam esse eius?</div> --}}
                <div class="font-bold">Nomor Telpon</div>
                {{$appointment->patient->patient_phone}}
                {{-- <div class="truncate overflow-auto"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, molestiae qui sapiente velit rem iusto sunt exercitationem error libero, rerum deleniti obcaecati et animi doloremque ullam molestias quibusdam esse eius?</div> --}}
                

              
              </div>

            </div>
            @endif



          </div>





      </div>




    </div>




    <div id="container-items-atas" class="  mt-20 xl:flex  justify-center h-fit">
      @if ($history and $antrian)
        @livewire('antrian-list',['antrian'=>$antrian,'history'=>$history,'q_type'=>'on_the_spot'])
      @endif

      @livewire('antrian-list',['antrian'=>$antrian,'history'=>$history,'q_type'=>'scheduled'])
    </div>

    {{-- ///////////////////////////////////// Container Bawah //////////////////////////////////////--}}
    {{-- <div id="container-items-bawah" class="md:flex sm:flex-inline ml-16 mr-16  justify-center space-x-4 content h-fit">
        @livewire('antrian-list')
      <div id="filler" class="flex-inline self-center p-8 w-4/5 h-fit sm:hidden ">
      </div>




    </div> --}}
</div>
