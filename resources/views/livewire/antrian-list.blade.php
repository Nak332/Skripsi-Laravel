<div id="container-antrian" class="flex-inline self-center p-8 w-4/5 h-fit sm:w-full">
    <h1 class="text-2xl font-bold mb-4">Antrian Pasien</h1>
    <div id="container-list-antrian" class="bg-white rounded-lg p-4 mb-4 overflow-y-auto h-96 drop-shadow">
        @livewire('q-items') 

    </div>
    <div x-data="{ open: false }">
        
        <button @click="open = true" class="drop-shadow hover:drop-shadow-xl transition-all bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 hover:transition-all px-4 rounded">Tambah</button>
        <div x-show="open">
            @livewire('form-modal')
        </div>
    </div>
    
    



  

  
</div> 