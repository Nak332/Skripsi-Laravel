<div id="container-antrian" class="flex-inline self-center p-8 w-4/5 h-fit sm:w-full">
    <h1 class="text-2xl font-bold mb-4">Antrian Pasien</h1>
    <div id="container-list-antrian" class="bg-white rounded-lg p-4 mb-4 overflow-y-auto h-96 drop-shadow">

        @if ($antrian)
            @foreach ($antrian as $a)
                
                <div x-data="{ expanded: false }" @click="expanded = !expanded" href="#" class="cursor-pointer" @click.outside="expanded = false" >
                    <div class="truncate bg-gray-300 p-3 m-4 rounded-lg hover:bg-blue-500
                    hover:ml-5 hover:mr-3 hover:border-black
                    hover:text-white hover:transition-all ">
                        <p class="">{{$a->antrian_number}} - {{$a->patient->patient_name}}</p>
                        <div class="pt-2 " x-show="expanded" x-collapse>
                            
                            <p class="border-t-2 pb-2 border-white"></p>
                            <p class="truncate">{{$a->patient->patient_address}}</p>
                            <p>{{$a->patient->patient_gender}}</p>
                            <p>{{$a->patient->getAge()}}</p>
                        </div>
                    </div>
                </div>
                
            @endforeach
        @endif

     
        

    </div>
    <div x-data="{ open: false }">
        
        <button @click="open = true" class="drop-shadow hover:drop-shadow-xl transition-all bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 hover:transition-all px-4 rounded">Tambah</button>
        <div wire:model='patients' x-show="open">
            @livewire('tambah-antrian-modal',['patients'=>$patients])
        </div>
        <div wire:model='patients'>
            {{-- @foreach ($patients as $p)
            <p>{{$p->patient_name}}</p>
            @endforeach --}}
        </div>
    </div>

    



  

  
</div> 