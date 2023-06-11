<div class="">
    <p>buat test search bar</p>

    <div class="justify-center m-4">
        @livewire('medicine-search-bar')
    </div>
    

    {{-- <div wire:click='add({{$ix}})' class="bg-green-500 p-2 rounded text-white">
        tes
    </div> --}}


    <div class="items-center overflow-y-auto">

        

    
    
        <div>
            @if ($obat)
            @foreach ($obat as $index => $o)
            <div class="flex drop-shadow-sm justify-center">
                <div class="bg-blue-500 justify-between p-2 rounded-tl rounded-bl">
                    <input wire:model="obat.{{ $index }}" type="number" class="items-center">
                    <input wire:model="qty.{{ $index }}" type="number" class="p-1" placeholder="99">
                </div>
            <div wire:click="remove({{ $index }})" class="bg-red-500 rounded-br rounded-tr justify-center text-center text-white font-bold">
            X
        </div>
    </div>
@endforeach
        @endif
        </div>
       
    </div>  
</div>
