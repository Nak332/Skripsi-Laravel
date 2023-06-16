<div >
    <input type="text" 
    class="form-input w-full underline-offset-1 sm:text-sm rounded-lg block p-2.5 outline-0" 
    placeholder="Cari Obat...." 
    wire:model='query'>
    <hr>
    <div>

    </div>
        <div class="rounded-lg  mt-2 flex-inline max-h-32 overflow-y-auto drop-shadow-sm">
            @if (!empty($query))
            {{-- <select class="mt-3 w-full rounded-lg bg-gray-200 border border-gray-300 text-gray-900 p-2" wire:model='selected_patient' name="" id="selected_patient"> --}}
           
            {{-- <option value=""@if (empty($patient)) disabled selected @endif> --}}
                @if (!empty($query) and empty($medicines))
                    
                    Obat tidak ditemukan
                    
                @endif
                
                <div class="p-2 cursor-pointer bg-gray-200 hover:bg-blue-500 hover:text-white transition-all" 
               
                class="max-w-xs truncate">
                    <p class="text-ellipsis max-w-xs">
                        {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, laudantium? Perspiciatis, similique! Nam, cumque corrupti cupiditate, quia provident totam nesciunt alias harum dolorum modi officia sit? Doloribus itaque exercitationem iste. x80 --}}
                    </p>
                </div>
                <hr>

         
                @foreach ($medicines as $m)
                    <div class="p-2 cursor-pointer bg-gray-200 hover:bg-blue-500 hover:text-white transition-all" 
                    x-on:click="$wire.addMedicine(id='{{$m['id']}}');$wire.setQuery(incoming_query='');" 
                    class="w-full flex">
                        <div class="flex justify-between">
                            <p>{{$m['medicine_name']}} </p>
                            <p>x80</p>

                        </div>
                            
                        
                    </div>
                    <hr>
    
                @endforeach
            
            @endif
        </div>
        {{-- {{$prescription->nth(1,1)  }} --}}
        
      
        
        {{-- <input wire:model='selected_patient_name' type="text"> --}}
    
        
        
      

       

    {{-- <p class="w-3/5 bg-red">{{$selected_patient}}</p> --}}
</div>
