<div id="container-antrian" class="flex-inline justify-end p-8 w-4/5 h-fit">
    <h1 class="text-2xl font-bold mb-4">Antrian Pasien</h1>
    <div id="container-list-antrian" class="bg-white rounded-lg p-4 mb-4 overflow-y-auto h-96 drop-shadow">
      <a href="#" class="">
          <p class="truncate bg-gray-300 p-3 m-4 rounded-lg hover:bg-blue-500 hover:ml-5 hover:mr-3 hover:text-white hover:transition-all">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
      </a> 
      {{-- <a href="#">
          <p class="bg-gray-300 p-3 m-4 rounded-lg hover:bg-blue-500 hover:ml-5 hover:mr-3 hover:text-white hover:transition-all">Row 1</p>
      </a>
      <a href="#">
          <p class="bg-gray-300 p-3 m-4 rounded-lg hover:bg-blue-500 hover:ml-5 hover:mr-3 hover:text-white hover:transition-all">Row 1</p>
      </a>
      <a href="#">
          <p class="bg-gray-300 p-3 m-4 rounded-lg hover:bg-blue-500 hover:ml-5 hover:mr-3 hover:text-white hover:transition-all">Row 1</p>
      </a>
      <a href="#">
          <p class="bg-gray-300 p-3 m-4 rounded-lg hover:bg-blue-500 hover:ml-5 hover:mr-3 hover:text-white hover:transition-all">Row 1</p>
      </a>
      <a href="#">
          <p class="bg-gray-300 p-3 m-4 rounded-lg hover:bg-blue-500 hover:ml-5 hover:mr-3 hover:text-white hover:transition-all">Row 1</p>
      </a>
      <a href="#">
          <p class="bg-gray-300 p-3 m-4 rounded-lg hover:bg-blue-500 hover:ml-5 hover:mr-3 hover:text-white hover:transition-all">Row 1</p>
      </a>
      <a href="#">
          <p class="bg-gray-300 p-3 m-4 rounded-lg hover:bg-blue-500 hover:ml-5 hover:mr-3 hover:text-white hover:transition-all">Row 1</p>
      </a> --}}
      
    </div>
    <div x-data="{ open: false }">
        
        <button @click="open = true" class="drop-shadow hover:drop-shadow-xl transition-all bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 hover:transition-all px-4 rounded">Tambah</button>
        <div x-show="open">
            @livewire('form-modal')
        </div>
    </div>
    
    



  

  
</div> 