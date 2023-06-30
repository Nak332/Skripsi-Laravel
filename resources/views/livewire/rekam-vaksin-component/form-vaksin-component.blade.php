<div class="container mx-auto p-4">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-screen-sm w-full mx-auto bg-white p-8 rounded-md shadow-md">
            <div class="drop-shadow flex-inline text-center text-black p-6 m-4 rounded-lg text-4xl w-128 h-fit">
                <p class="font-bold text-black">Vaksinasi</p>
                </div>
          <form method="POST" action="/vaksinasi/tambah" enctype="multipart/form-data">
            @csrf
            <div><span class="text-sm text-red-500">*Wajib diisi</span></div><br> 
            <div class="mb-4">
              <label class="block mb-2 text-sm font-medium text-gray-900 " for="patient_id">Pasien<span class="text-red-500">*</span></label>
                @livewire('patient-search-bar')
                @if ($selected_patient)
                <div id="selected-patient-container" class="flex">
                 <div id="selected-patient-card" class=" flex-inline">
                    
                    <div>
                       <p class="font-bold text-white rounded-lg bg-blue-500 p-3 truncate">
                          {{$selected_patient['patient_name']}}
                       </p>
                    </div>
                 </div>
                 <input type="text" name="patient_id" id="patient_id" hidden value="{{$selected_patient['id']}}">
            
                </div>

              @endif
              @error('patient_id')
              <div class="text-xs text-red-600">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-4">
              <label for="vaccination_date" class="block text-gray-700 text-sm font-medium mb-2">Tanggal vaksinasi<span class="text-red-500">*</span></label>
              <input type="date" value="{{ date('Y-m-d') }}" id="vaccination_date" name="vaccination_date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
            </div>
            @error('vaccination_date')
            <div class="text-xs text-red-600">{{ $message }}</div>
            @enderror
            <input type="text" name="employee_id" id="employee_id" hidden value="{{Auth::user()->employee_id}}">
            <hr>

            <div class="mb-4 mt-4">
                <label for="jenis_vaksin" class="block text-gray-700 text-sm font-medium mb-2">Jenis Vaksin<span class="text-red-500">*</span></label>
                <select  name="jenis_vaksin" id="jenis_vaksin" class="w-full px-4 py-2 border border-gray-300 rounded-md ">
                    <option hidden disabled selected class="pl-4 py-2">-- Pilih jenis vaksin --</option>
                    @foreach ($penyakit as $p)
                    <option value="{{$p}}">{{$p}}</option>
                    @endforeach

                </select>
                @error('jenis_vaksin')
              <div class="text-xs text-red-600">{{ $message }}</div>
              @enderror
              </div>
              


            <div class="mb-4">
              <label for="vaccine_name" class="block text-gray-700 text-sm font-medium mb-2">Nama Vaksin<span class="text-red-500">*</span></label>
              <input type="text" id="vaccine_name" name="vaccine_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
              @error('vaccine_name')
              <div class="text-xs text-red-600">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="mb-4">
              <label for="supplier" class="block text-gray-700 text-sm font-medium mb-2">Supplier Vaksin</label>
              <input type="text" id="supplier" name="supplier" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
            </div>


            <div class="mb-4">
              <label for="batch_number" class="block text-gray-700 text-sm font-medium mb-2">Nomor Batch<span class="text-red-500">*</span></label>
              <input type="text" id="batch_number" name="batch_number" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
              @error('batch_number')
              <div class="text-xs text-red-600">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-4">
              <label for="expired_date" class="block text-gray-700 text-sm font-medium mb-2">Tanggal Kadarluasa<span class="text-red-500">*</span></label>
              <input type="date" name="expired_date" id="next_dose" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="Harga obat">
              @error('expired_date')
              <div class="text-xs text-red-600">{{ $message }}</div>
              @enderror
            </div>

              <div class="mb-4">
                <label for="notes" class="block text-gray-700 text-sm font-medium mb-2">Catatan</label>
                <textarea rows="2" id="notes" name="notes" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Dosis pertama pasien"></textarea>
                @error('notes')
                <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
              </div>

              <hr>
            <div class="mb-4 mt-4">
              <label for="next_dose" class="block text-gray-700 text-sm font-medium mb-2">Dosis berikut</label>
              <input type="date" name="next_dose" id="next_dose" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="Harga obat">
              @error('next_dose')
              <div class="text-xs text-red-600">{{ $message }}</div>
              @enderror
            </div>
              <div class="flex justify-center">
                <button type="submit" class="rounded-lg font-medium bg-green-500 hover:bg-white hover:text-green-500 hover:outline hover:outline-green-500 outline-2 transition-all  text-sm px-5 py-2.5 mr-2 mb-2 text-center text-white">Submit</button>
            </div>
          </form>
        </div>
      </div>
