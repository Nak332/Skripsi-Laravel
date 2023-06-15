<div id="container-antrian" class="flex-inline self-center p-8  h-fit w-full truncate">
    <div class="flex justify-between items-start">
        <h1 class="text-2xl font-bold mb-4">
            @if ($q_type=='on_the_spot')
                Antrian Kunjungan
            @elseif($q_type=='scheduled')
                Daftar Perjanjian
            @endif
        </h1>
        <button x-on:click="" wire:click="$emit('refreshComponent')" class="bg-green-500 hover:bg-white space-x-2 hover:text-green-500 transition-all text-white p-2 rounded flex items-center" title="Beri giliran ke pasien selanjutnya">
            <p class="pl-1"> Antrian Selanjutnya</p>
            <x-fas-up-long class="w-4 h-4" />
        </button>

    </div>
    
    <div id="container-list-antrian" class="bg-white rounded-lg p-4 mb-4 overflow-y-auto h-96 drop-shadow">

        @if ($antrian)
            @foreach ($antrian as $a)
                @if ($q_type==$a->appointment_type && $a->status == '1')

                <div x-data="{ expanded: false }" @click="if(!expanded){expanded = !expanded}" href="#" class="cursor-pointer" @click.outside="expanded = false">
                    <div class="truncate bg-gray-300 p-3 m-4 rounded-lg hover:bg-blue-500
                    hover:ml-5 hover:mr-3 hover:border-black
                    hover:text-white hover:transition-all ">
                        <div class="flex justify-between items-center">
                            <p class="">@if ($q_type=='on_the_spot')    A @else J @endif {{$a->antrian_number}} - {{$a->patient->patient_name}} @if ($q_type=='scheduled') - {{$a->appointment_date}} @endif</p>
                            <div class="h-fit">
                                <button x-on:click="" wire:click="$emit('refreshComponent')" class="bg-yellow-400 hover:bg-white hover:text-yellow-400 transition-all text-white p-2 rounded" title="Ib">
                                    <x-far-edit class="w-4 h-4" />
                                </button>
                            </div>
                            

                        </div>

                            <div class="pt-2" x-show="expanded" x-collapse>
                                <p class="border-t-2 pb-2 border-white"></p>

                                <div class="pt-2 flex">
                                    <div class="w-4/5">
                                
                                        <p class="truncate">{{$a->patient->patient_address}}</p>
                                        <p>{{$a->patient->patient_gender}}</p>
                                        <p>{{$a->patient->getAge()}}</p>
                                    </div>
    
                                    <div class="w-1/5 flex justify-end">
                                    
                                        <div class="space-y-1">
                                            <div class="h-fit">
                                                <button x-on:click="$wire.sendPatientToParentComponent(id='{{$a->id}}');" wire:click="$emit('refreshComponent')" class="bg-green-500 hover:bg-white hover:text-green-500 transition-all text-white p-2 rounded" title="Beri giliran ke pasien ini">
                                                    <x-fas-up-long class="w-4 h-4" />
                                                </button>
                                            </div>
                                            <form action="/hapus-antrian/{{$a->id}}" method="post" class="w-fit">
                                                @csrf
                                                <button class="bg-red-500 hover:bg-white hover:text-red-500 transition-all text-white p-2 rounded" title="Hapus antrian pasien ini">
                                                    <x-feathericon-x class="w-4 h-4" />
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                                
                            </div>






                    </div>
                </div>

                @endif


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
