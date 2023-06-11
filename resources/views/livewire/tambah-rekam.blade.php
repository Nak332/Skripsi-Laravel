<div class="container mx-auto w-max-1/2 p-4 min-h-screen h-fit">
    <div class=" w-full flex  justify-center">
       <div class="max-w-screen py-12w-full mx-auto bg-white p-8 rounded-md shadow-md mt-8">
            <div class="drop-shadow flex-inline text-center text-black   m-4 rounded-lg text-4xl h-fit">
                <p class="font-bold text-black">Rekam Medis</p>
                </div>
          <form method="POST" action="/form_rekam/tambah" enctype="multipart/form-data">
            @csrf


            {{-- <div class="mb-4">
              <label for="patient_id" class="block text-gray-700 text-sm font-medium mb-2">Pasien</label>
              <input type="text" id="patient_id" name="patient_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Masukan .. pasien">
            </div> --}}
            {{-- <div class="mb-4">
              <label for="appointment_id" class="block text-gray-700 text-sm font-medium mb-2">Appointment</label>
              <input type="text" id="appointment_id" name="appointment_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
            </div> --}}
            {{-- <div class="mb-4">
              <label for="employee_id" class="block text-gray-700 text-sm font-medium mb-2">Employee</label>
              <input type="text" name="employee_id" id="employee_id" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
            </div> --}}

            {{--Bikin iinvisible buat 3 bagian diatas --}}

            <div id="container_pasien" class="flex-inline py-4">



                <div class="px-6 py-4 w-1/3 ml-2" x-data="{ show: true }">
                    <input
                     type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @click="show = !show;$wire.clear();$wire.getFromQueue();">
                    <label for="checkbox" class="ml-2 text-sm font-medium text-gray-400 dark:text-gray-700">Gunakan antrian pasien</label>
                    <div class="mt-4" x-show="show">
                        @livewire('patient-search-bar')
                    </div>
                </div>



                @if ($selected_patient)
                <div id="selected-patient-container" class="flex">
                    <div id="selected-patient-card" class="w-1/2 flex-inline px-8">

                        <label class="block mb-2 text-sm font-medium text-gray-900  " for="patient_id">Pasien</label>
                        <div>
                            <p class="font-bold text-white rounded-lg bg-blue-500 p-3 truncate">
                            {{$selected_patient['patient_name']}}
                            {{-- Satria Narayana --}}
                            </p>
                        </div>

                    </div>

                    <div id="selected-patient-card" class="w-1/2 flex-inline px-8">
                        {{-- @if ($selected_patient) --}}
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="patient_id">Kunjungan terakhir</label>
                        <div>
                            <p class="py-3 px-2 truncate">
                            {{-- {{$selected_patient['patient_name']}} --}}
                            {{$selected_patient->lastAppointment()->created_at}}
                            </p>
                        </div>
                    <input type="text" name="patient_id" id="patient_id" hidden value="{{$selected_patient['id']}}">
                    <input type="text" name="appointment_id" id="appointment_id"  wire:model='q_number' hidden @if($q_number>0) value="{{ $q_number }}" @else value="-1" @endif >
                    <input type="text" name="employee_id" id="employee_id" hidden value="{{Auth::user()->employee_id}}">



                    </div>


                </div>
                @endif


              <hr class="mt-8">
            </div>



            <div id="main_container_form" class="md:flex px-4">


              <div id="left-side" class="md:w-1/2 flex-inline p-6">
                <div class="mb-4">
                  <label for="keluhan" class="block text-gray-700 text-sm font-medium mb-2">Keluhan</label>
                  <textarea name="complaint" id="complaint" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                </div>
                <div class="mb-4">
                  <label for="symptoms" class="block text-gray-700 text-sm font-medium mb-2">Gejala</label>
                  <textarea name="symptoms" rows="2" id="symptoms" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                </div>
                <div class="mb-4">
                  <label for="hasil_anamnesis" class="block text-gray-700 text-sm font-medium mb-2">Anamnesis</label>
                  <textarea name="anamnesis" id="anamnesis" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                </div>



                <div class="mb-4">
                  <label for="suhu_badan" class="block text-gray-700 text-sm font-medium mb-2">Suhu Badan</label>
                  <div class="flex">
                    <input type="number" name='body_temperature' step="0.1" min="25" max="45" id="body_temperature" class="md:w-1/4 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=36 >
                    <div class=" p-3"><h1>° C</h1></div>
                  </div>
                </div>

                <div class="md:flex inline">
                  <div class="mb-4 w-1/2">
                    <label for="suhu_badan" class="block text-gray-700 text-sm font-medium mb-2">Sistol</label>
                    <div class="flex">
                      <input type="number" name='sistol' id="sistol" class="md:w-1/2  px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=120 >
                      <div class=" p-3"><h1>mmHg</h1></div>
                    </div>
                  </div>


                  <div class="mb-4 w-1/2">
                    <label for="suhu_badan" class="block text-gray-700 text-sm font-medium mb-2">Diastol</label>
                    <div class="flex">
                      <input type="number" name='diastol' id="diastol" class="md:w-1/2 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=80 >
                      <div class=" p-3"><h1>mmHg</h1></div>
                    </div>
                  </div>
                </div>


                <div class="mb-4">
                  <label for="penatalaksaan" class="block text-gray-700 text-sm font-medium mb-2">Penatalaksanaan</label>
                  <textarea rows="3" name="follow_up_plan" id="follow_up_plan" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                </div>
              </div>

              <div id="right-side" class="md:w-1/2 flex-inline p-6">
                <div class="mb-4">
                  <label for="disease" class="block text-gray-700 text-sm font-medium mb-2">Diagnosa</label>
                  <input type="text" name="diagnosis" id="diagnosis" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                </div>
                {{-- <div class="mb-4">
                  <label for="total_price" class="block text-gray-700 text-sm font-medium mb-2">Total Price</label>
                  <input type="text" name="total_price" id="total_price" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                </div>
                <div class="mb-4">
                  <label for="type" class="block text-gray-700 text-sm font-medium mb-2">Type</label>
                  <input type="text"  name="type" id="type" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                </div> --}}
                <div class="mb-4">
                  <label for="note" class="block text-gray-700 text-sm font-medium mb-2">Note</label>
                  <textarea id="note" name="note" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                </div>

                <div class="mb-4">
                  <label for="medicine_id" class="block text-gray-700 text-sm font-medium mb-2">Preskripsi Obat</label>
                  {{-- <input type="text" id="medicine_id" name="medicine_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Obat"> --}}
                  <div class="truncate h-96 bg-blue-200">
                    {{-- @livewire('medicine-cart') --}}
                  </div>
                  
                </div>

                
                <div class="mb-4">
                    <label for="penatalaksaan" class="block text-gray-700 text-sm font-medium mb-2">Tindakan</label>
                    <textarea rows="3" name="treatment" id="treatment" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                </div>

                {{-- <div class="mb-4">
                  <label for="extramedicine_id" class="block text-gray-700 text-sm font-medium mb-2">Extra Medicine</label>
                  <input type="text" id="extramedicine_id" name="extramedicine_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
                </div> --}}
                {{-- <div class="mb-4">
                  <label for="total_price" class="block text-gray-700 text-sm font-medium mb-2">Total Price</label>
                  <input type="text" name="total_price" id="total_price" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                </div> --}}
              </div>

            </div>

            <hr class="my-8">
            <div id="selected-patient-footer" class="flex justify-center">

                <div class="mb-4 w-1/2">
                    <label for="penatalaksaan" class="block text-gray-700 text-sm font-medium mb-2">Status Rekam</label>
                    <select name="flag" class="w-1/2" id="flag">
                        <option value="0">Terbuka</option>
                        <option value="1" selected>Final</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="penatalaksaan" class="block text-gray-700 text-sm font-medium mb-2">Tindakan</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  name="file_input" id="file_input" type="file">
                </div>





            </div>



              <div class="flex justify-center">
                <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Submit</button>
            </div>
          </form>
        </div>
      </div>
