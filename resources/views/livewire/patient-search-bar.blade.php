<div >
    <input type="text" 
    class="form-input w-full underline-offset-1 sm:text-sm rounded-lg block p-2.5 outline-0" 
    placeholder="Cari Pasien...." 
    wire:model='query'>
    <hr>
    <div>

    </div>
        <div class="rounded-lg  mt-2 flex-inline max-h-32 overflow-y-auto drop-shadow-sm">
            @if (!empty($query))
            {{-- <select class="mt-3 w-full rounded-lg bg-gray-200 border border-gray-300 text-gray-900 p-2" wire:model='selected_patient' name="" id="selected_patient"> --}}
           
            {{-- <option value=""@if (empty($patient)) disabled selected @endif> --}}
                @if (!empty($query) and empty($patient))
                    
                    Pasien tidak ditemukan
                    
                @endif

            </option>
            @foreach ($patient as $p)
                <div class="p-2 cursor-pointer bg-gray-200 hover:bg-blue-500 hover:text-white transition-all" 
                x-on:click="$wire.selectPatient(id='{{$p['id']}}');$wire.setQuery(incoming_query='');" 
                class="w-full">
                    <p>
                        {{$p['patient_name']}}
                    </p>
                </div>
                <hr >
  
            @endforeach
        
            @endif
        </div>

        
        {{-- <input wire:model='selected_patient_name' type="text"> --}}
    
        
        
      

       

    {{-- <p class="w-3/5 bg-red">{{$selected_patient}}</p> --}}
</div>
