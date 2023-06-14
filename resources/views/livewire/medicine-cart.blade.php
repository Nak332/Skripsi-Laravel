<div class="">

    <div class="justify-center m-4">
        @livewire('medicine-search-bar')
    </div>

    <div class="overflow-y-auto h-72 ">  


        @if ($obat)
        <div class="w-full ">
            
            @foreach ($obat as $index => $o)
            
            <div class="flex drop-shadow-sm  justify-center p-4 ">
                <div class="border border-gray-300 rounded-tl justify-between rounded-bl w-full flex">
                    <div class="items-center p-3 w-10/12">
                        <div class="w-full text-black"> {{$obat_name[$index]}} </div>
                    </div>
                    <div class="p-2 text-center">
                        <input wire:model="qty.{{ $index }}" type="number" wire:change='updateParentData' class="p-1 rounded-md w-3/5 border outline-none border-gray-300" placeholder="99">
                    </div>
                </div>
                <div wire:click="remove({{ $index }})"  class="bg-red-500 rounded-br w-1/12 p-3 border border-red-500  rounded-tr justify-center text-center text-white font-bold cursor-pointer hover:bg-white hover:text-red-500 transition-all">
                    X
                </div>
            </div>
    

    
            @endforeach
        </div>
        @endif
    </div>  
</div>