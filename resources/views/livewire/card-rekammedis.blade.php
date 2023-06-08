
<div id="main">
    <div id="card-header" class="flex justify-center p-4">
        <div class="w-1/2 inline p-6">
            <label for="keluhan" class="block text-gray-700 text-sm font-medium mb-2">Tanggal Pembuatan</label>
            <p> {{$Rekam->created_at}}</p>
        </div>
        <div class="w-1/2 inline p-6">
            <label for="keluhan" class="block text-gray-700 text-sm font-medium mb-2">Dokter</label>
            <p>{{$emp->employee_name}}</p>
        </div>
    </div>
    <hr>


    <div id="main_container_card" class="h-fit md:flex overflow-y-auto m-4">




        <div id="left-side" class="flex-inline p-6 w-1/2">
        <div class="mb-4">
            <label for="keluhan" class="block text-gray-700 text-sm font-medium mb-2">Keluhan</label>
            <p class="bg-gray-200 rounded-lg p-2">
                {{$Rekam->complaint}}
            </p>

        </div>
        <div class="mb-4">
            <label for="symptoms" class="block text-gray-700 text-sm font-medium mb-2">Gejala</label>
            <p>{{$Rekam->symptoms}}</p>
        </div>

        <div class="mb-4">
            <label for="hasil_anamnesis" class="block text-gray-700 text-sm font-medium mb-2">Anamnesis</label>
            <p>{{$Rekam->anamnesis}}</p>
        </div>



        <div class="mb-4">
            <label for="suhu_badan" class="block text-gray-700 text-sm font-medium mb-2">Suhu Badan</label>
            <div class="flex items-center p-3 text-white rounded-lg w-fit bg-green-500">
            {{-- <input type="number" name='suhu_badan' step="0.1" min="25" max="45" id="body_temperature" class="md:w-1/4 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=36 > --}}
            <p class="px-1 py-1  rounded-md resize-none"> {{$Rekam->body_temperature}}</p>
            <div class=" p-1"><h1>° C</h1></div>
            </div>
        </div>

        <div class="md:flex ">
            <div class="mb-4 w-1/2">
            <label for="suhu_badan" class="block text-gray-700 text-sm font-medium mb-2">Sistol</label>
            <div class="flex items-center p-2 text-white rounded-lg w-fit bg-green-500">
                {{-- <input type="number" name='body_temperature' id="suhu_badan" class="md:w-1/2  px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=120 > --}}
                <p class="px-1 py-1  rounded-md resize-none"> {{$Rekam->sistol}} </p>
                <div class=" p-1"><h1>mmHg</h1></div>
            </div>
            </div>


            <div class="mb-4 w-1/2">
            <label for="suhu_badan" class="block text-gray-700 text-sm font-medium mb-2">Diastol</label>
            <div class="flex items-center p-2 text-white rounded-lg w-fit bg-green-500">
                {{-- <input type="number" name='body_temperature' id="suhu_badan" class="md:w-1/2 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=80 > --}}
                <p class="px-1 py-1  rounded-md resize-none"> {{$Rekam->diastol}} </p>
                <div class="p-1"><h1>mmHg</h1></div>
            </div>
            </div>
        </div>
        </div>

        <div id="right-side" class="flex-inline p-6 w-1/2">

        <div class="mb-4">
            <label for="disease" class="block text-gray-700 text-sm font-medium mb-2">Diagnosa</label>
            <p>{{$Rekam->diagnosis}}</p>

            {{-- <input type="text" name="disease" id="disease" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea> --}}
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
            <p>{{$Rekam->note}}</p>
            {{-- <textarea id="note" name="note" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea> --}}
        </div>

        <div class="mb-4">
            <label for="medicine_id" class="block text-gray-700 text-sm font-medium mb-2">Preskripsi Obat</label>
            <p>Paracetamol</p>
            {{-- <input type="text" id="medicine_id" name="medicine_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Obat"> --}}
        </div>

        <div class="mb-4">
            <label for="penatalaksaan" class="block text-gray-700 text-sm font-medium mb-2">Penatalaksanaan</label>
            <p> {{$Rekam->follow_up_plan}}</p>
            {{-- <textarea rows="3" name="penatalaksaan" id="penatalaksaan" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea> --}}
        </div>
        <div class="mb-4">
            <label for="penatalaksaan" class="block text-gray-700 text-sm font-medium mb-2">Tindakan</label>
            <p>{{$Rekam->treatment}}</p>
            {{-- <textarea rows="3" name="penatalaksaan" id="penatalaksaan" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea> --}}
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
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
        </div>





    </div>



</div>

