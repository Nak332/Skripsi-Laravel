<div class="container mx-auto w-max-1/2 p-4 min-h-screen h-fit">
  <div class=" w-full flex  justify-center">
     <div class="max-w-screen py-12 w-full mx-auto bg-white p-8 rounded-md shadow-md mt-8">
        <div class="drop-shadow flex-inline text-center text-black   m-4 rounded-lg text-4xl h-fit">
           <p class="font-bold text-black">Rekam Medis</p>
        </div>
        <form method="POST" action="/form_rekam/tambah" enctype="multipart/form-data">
           @csrf
           {{--Bikin iinvisible buat 3 bagian diatas --}}
            <input name='blood_sugar' wire:model='blood_sugar' step="0.1" type="number" hidden >
            <input name='body_temperature' wire:model='body_temperature' step="0.1" type="number" hidden >
            <input name='diastol' wire:model='diastol' type="number" hidden >
            <input name='sistol' wire:model='sistol' type="number" hidden >
            <input name='height' wire:model='height' step="0.1" type="number" hidden >
            <input name='weight' wire:model='weight' step="0.1" type="number" hidden >
            <input name='complaint' wire:model='complaint' type="text" hidden >

            <div class="px-6 ml-2"><span class="text-sm text-red-500">*Wajib diisi</span></div><br>
           <div id="container_pasien" class="flex-inline py-4">
              <div class="px-6 py-4 w-1/3 ml-2" x-data="{ show: true }">
                  <label for="Pasien" class="block text-black text-sm font-medium mb-2">Pasien<span class="text-red-500">*</span></label>
                 <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @click="show = !show;$wire.clear();$wire.getFromQueue();">
                 <label for="checkbox" class="ml-2 text-sm font-medium text-gray-400 dark:text-black">Gunakan antrian pasien</label>
                 @if ($check=='false')
                 <p class="mt-3 text-sm text-red-500">
                  Antrian masih kosong
                 </p>

                 @endif

                     <div class="mt-4" x-show="show">
                    @livewire('patient-search-bar')
                     </div>
                     @error('patient_id') <span class="text-xs text-red-500">{{$message}}</span> @enderror
              </div>
              @if ($selected_patient)
              <div id="selected-patient-container" class="flex">
                 <div id="selected-patient-card" class="w-1/2 flex-inline px-8">

                    <div>
                       <p class="font-bold text-white rounded-lg bg-blue-500 p-3 truncate">
                           {{$selected_patient['patient_name']}} <br>
                           Nomor Pasien {{$selected_patient['id']}}    <br>
                           {{$selected_patient['patient_address']}} <br>
                           {{$selected_patient['patient_phone']}}
                       </p>
                       </p>
                    </div>
                 </div>
                 <div id="selected-patient-card" class="w-1/2 flex-inline px-8">
                  @if ($selected_patient->lastAppointment())
                  <label class="block mb-2 text-sm font-medium text-gray-900 " for="patient_id">Kunjungan terakhir</label>
                  <div>
                     <p class="py-3 px-2 truncate ">

                        {{$selected_patient->lastAppointment()['created_at']}}
                        <div wire:click="$emit('openModal','rekam-summary',{{ json_encode(['selected_patient' => $selected_patient]) }})" class=" p-2  bg-gray-700 text-white hover:text-gray-700 hover:bg-white hover:outline transition-all hover:outline-gray-700 rounded cursor-pointer w-fit"> Riwayat Kunjungan</div>
                     </p>
                  </div>
                  @endif

                    <input type="text" name="patient_id" id="patient_id" hidden value="{{$selected_patient['id']}}">
                    <input type="text" name="appointment_id" id="appointment_id"  wire:model='q_number' hidden @if($q_number>0) value="{{ $q_number }}" @else value="-1" @endif >
                    <input type="text" name="employee_id" id="employee_id" hidden value="{{Auth::user()->employee_id}}">
                 </div>
              </div>
              @endif

              <hr class="mt-8">


           </div>

           <div id="main_container_form" class="md:flex px-4">
            <div id="left-side" class="w-1/2 flex flex-col justify-between p-6">
               <div class=" flex justify-start ">
                  <div onclick="Livewire.emit('openModal', 'rekam-tests',{{ json_encode(['antrian' => $antrian,'complaint'=>$complaint,'body_temperature'=>$body_temperature,'blood_sugar'=>$blood_sugar,'height'=>$height,'weight'=>$weight,'sistol'=>$sistol,'diastol'=>$diastol,'pulse'=>$pulse]) }})" class=" cursor-pointer text-white hover:text-gray-700 hover:bg-white hover:outline transition-all hover:outline-gray-700 flex mt-4 items-center space-x-2 w-fit bg-gray-700 p-3 rounded">
                     <div class="w-6 h-6"><x-fontisto-blood-test /></div>
                     <p class="text-md font-bold ">Hasil pemeriksaan</p>
                  </div>

                 </div>
            </div>
         </div>
           <div id="main_container_form" class="md:flex px-4">
               <div id="left-side" class="w-1/2 flex flex-col justify-between p-6">
                  <div class="mb-4">
                     <label for="hasil_anamnesis" class="block text-black text-sm font-medium mb-2">Anamnesis<span class="text-red-500">*</span></label>
                     <textarea name="anamnesis" id="anamnesis" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                     @error('anamnesis') <span class="text-xs text-red-500">{{$message}}</span> @enderror
                  </div>

                 <div class="mb-4">
                    <label for="penatalaksaan" class="block text-black text-sm font-medium mb-2">Penatalaksanaan</label>
                    <textarea rows="3" name="follow_up_plan" id="follow_up_plan" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                 </div>
                 <div class="mb-4">
                  <label for="tindakan" class="block text-black text-sm font-medium mb-2">Tindakan<span class="text-red-500">*</span></label>
                  <textarea rows="3" name="treatment" id="treatment" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                  @error('treatment') <span class="text-xs text-red-500">{{$message}}</span> @enderror
                </div>

               <div class="mb-4">
                  <label for="diagnosis" class="block text-black text-sm font-medium mb-2">Diagnosa<span class="text-red-500">*</span></label>
                  <textarea rows="3" name="diagnosis" id="diagnosis" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                  @error('diagnosis') <span class="text-xs text-red-500">{{$message}}</span> @enderror
               </div>
               <div class="mb-4">
                  <label for="note" class="block text-black text-sm font-medium mb-2">Catatan</label>
                  <textarea id="note" name="note" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
               </div>
              </div>


              <div id="right-side" class="w-1/2 flex flex-col justify-between p-6">



                 <div id="med" class="mb-4  overflow-auto">
                    <label for="medicine_id" class="block text-black text-sm font-medium mb-2">Preskripsi Obat</label>

                    <div class="  p-2 rounded-md border border-gray-300 ">
                       @livewire('medicine-cart')

                       {{-- @if ($obat && $qty && count($obat) === count($qty))
                       @foreach ($obat as $index => $o)
                           /{{$o}} /{{$qty[$index]}}/
                       @endforeach
                           {{$listobat}} |||| {{$listqty}}
                   @endif --}}
                    </div>
                 </div>

                 <input type="text" name="medicine_id" id="medicine_id" hidden value="{{$listobat}}">
                 <input type="text" name="quantity" id="quantity" hidden value="{{$listqty}}">
                 <input type="text" name="konsumsi" id="konsumsi" hidden value="{{$konsumsilist}}">
                 <input type="text" name="dosis" id="dosis" hidden value="{{$dosislist}}">

                 <div class="mb-4">
                    <label for="obat lain" class="block text-black text-sm font-medium mb-2">Obat lain</label>
                    <textarea rows="3" name="extra_medicine" id="extra_medicine" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                 </div>




              </div>

            </div>
            <hr class="mb-8">
            <div class="flex justify-center">

               <div x-data="{ rujukan: @entangle('rujukan') }" >
                  <label for="toggleSwitch">Buat Rujukan</label>
                  <input type="checkbox" id="toggleSwitch" x-model="rujukan" x-on:click="rujukan = !toggleProperty">
                </div>
            </div>


            <div class="w-full px-10">

               @if ($rujukan)

                  <div class="mb-4 ">
                     <label for="dissease" class="block text-black text-sm font-medium mb-2">Kepada Rumah Sakit / Klinik / Dokter</label>
                     <input type="text" name="rujukan_recipient" id="rujukan_recipient" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                  </div>

                  <div class="mb-4 ">
                     <label for="disease" class="block text-black text-sm font-medium mb-2">Untuk Poli</label>
                     <input type="text" name="rujukan_specialist" id="rujukan_specialist" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="Ortopedi"></textarea>
                  </div>

                  <div class="mb-4 ">
                     <label for="dissease" class="block text-black text-sm font-medium mb-2">Kondisi dan pengobatan saat ini</label>
                     <input type="text" name="rujukan_current_state" id="rujukan_current_state" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="Badan lemas, suhu normal, sedang Diberi obat X 3 kali sehari"></textarea>
                  </div>


               @endif

            </div>





            <hr class="my-8">
            <div id="selected-patient-footer" class="flex justify-center mb-4">

                <div class="mb-4 w-1/2 hidden">
                    <label for="penatalaksaan" class="block text-black text-sm font-medium mb-2">Status Rekam</label>
                    <select name="flag" class="w-1/2" id="flag">
                        <option value="0">Terbuka</option>
                        <option value="1" selected>Final</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="penatalaksaan" class="block text-black text-sm font-medium mb-2">Lampiran</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" name="file_input" type="file">
                    @error('file_input') <span class="text-xs text-red-500">{{$message}}</span> @enderror
                </div>





            </div>


<hr>
              <div class="flex justify-center mt-4">
                <button type="submit" class="rounded-lg font-medium bg-green-500 hover:bg-white hover:text-green-500 hover:outline hover:outline-green-500 outline-2 transition-all  text-sm px-5 py-2.5 mr-2 mb-2 text-center text-white">Submit</button>
            </div>
          </form>
        </div>
      </div>
