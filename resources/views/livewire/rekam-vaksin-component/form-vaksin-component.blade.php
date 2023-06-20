<div class="container mx-auto p-4">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-screen-sm w-full mx-auto bg-white p-8 rounded-md shadow-md">
            <div class="drop-shadow flex-inline text-center text-black p-6 m-4 rounded-lg text-4xl w-128 h-fit">
                <p class="font-bold text-black">Vaksinasi</p>
                </div>
          <form method="POST" action="vaksinasi/tambah" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                @livewire('patient-search-bar')
                @if ($selected_patient)
                <div id="selected-patient-container" class="flex">
                 <div id="selected-patient-card" class=" flex-inline">
                    <label class="block mb-2 text-sm font-medium text-gray-900  " for="patient_id">Pasien</label>
                    <div>
                       <p class="font-bold text-white rounded-lg bg-blue-500 p-3 truncate">
                          {{$selected_patient['patient_name']}}
                       </p>
                    </div>
                 </div>
                 <input type="text" name="patient_id" id="patient_id" hidden value="{{$selected_patient['id']}}">
                </div>
              
              @endif
              
            </div>
            <div class="mb-4">
              <label for="vaccination_date" class="block text-gray-700 text-sm font-medium mb-2">Tanggal vaksinasi</label>
              <input type="date" value="{{ date('Y-m-d') }}" id="vaccination_date" name="vaccination_date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
            </div>
         
            <hr>

            <div class="mb-4 mt-4">
                <label for="vaccine_name" class="block text-gray-700 text-sm font-medium mb-2">Jenis Vaksin</label>
                <select  name="penyakit" id="" class="w-full px-4 py-2 border border-gray-300 rounded-md ">
                    @foreach ($penyakit as $p)
                    <option value="{{$p}}">{{$p}}</option>
                    @endforeach
                    
                </select>
              </div>


            <div class="mb-4">
              <label for="vaccine_name" class="block text-gray-700 text-sm font-medium mb-2">Nama Vaksin</label>
              <input type="text" id="vaccine_name" name="vaccine_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Influvac">
            </div>
            <div class="mb-4">
              <label for="vaccine_name" class="block text-gray-700 text-sm font-medium mb-2">Supplier Vaksin</label>
              <input type="text" id="supplier" name="supplier" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Abott">
            </div>
            
           
            <div class="mb-4">
              <label for="batch_number" class="block text-gray-700 text-sm font-medium mb-2">Nomor Batch</label>
              <input type="text" id="batch_number" name="batch_number" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
            </div>
            <div class="mb-4">
              <label for="next_dose" class="block text-gray-700 text-sm font-medium mb-2">Tanggal Kadarluasa</label>
              <input type="date" name="expired_date" id="next_dose" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="Harga obat">
            </div>

              <div class="mb-4">
                <label for="notes" class="block text-gray-700 text-sm font-medium mb-2">Catatan</label>
                <textarea rows="2" id="notes" name="notes" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Dosis pertama pasien"></textarea>
              </div>

              <hr>
            <div class="mb-4 mt-4">
              <label for="next_dose" class="block text-gray-700 text-sm font-medium mb-2">Dosis berikut</label>
              <input type="date" name="next_dose" id="next_dose" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="Harga obat">
            </div>
              <div class="flex justify-center">
                <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Submit</button>
            </div>
          </form>
        </div>
      </div>