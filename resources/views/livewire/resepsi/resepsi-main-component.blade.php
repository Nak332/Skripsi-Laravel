<div id="container-main" class="flex-inline bg-gray-200 min-h-screen">

    <div id="header-page" class="flex justify-center">
      <div id="current queue" class="drop-shadow flex-inline text-center   text-black p-6 m-4 rounded-lg text-4xl w-128 h-fit">
      {{-- <p class="">Antrian sekarang:</p> --}}
      <p id="card_pasien_sekarang"  class="font-bold bg-blue-400 rounded-lg mt-2 p-5 truncate text-white">
        @if ($current_patient)
            <p>A {{$q_number}} {{$current_patient['patient_name']}}</p>
        @elseif ($current_patient == NULL && $appointment != NULL)
            <p>A {{$appointment->antrian_number}} {{$appointment->patient->patient_name}}</p>
        @else
                Kosong
        @endif


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
