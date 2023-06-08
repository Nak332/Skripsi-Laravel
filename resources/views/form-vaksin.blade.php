@extends('layouts.master')

@section('title','Form Vaksin')

@extends('layouts.navigation-bar')

@section('content')



<div id="container-main" class="bg-gray-200">
  <div class="container mx-auto p-4">
        <div class="min-h-screen flex items-center justify-center">
            <div class="max-w-screen-sm w-full mx-auto bg-white p-8 rounded-md shadow-md">
                <div class="drop-shadow flex-inline text-center text-black p-6 m-4 rounded-lg text-4xl w-128 h-fit">
                    <p class="font-bold text-black">Tambah pasien tervaksinasi</p>
                    </div>
              <form method="POST" action="vaksinasi/tambah" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                  <label for="vaccine_name" class="block text-gray-700 text-sm font-medium mb-2">Nama vaksin</label>
                  <input type="text" id="vaccine_name" name="vaccine_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="vaksin">
                </div>
                <div class="mb-4">
                  <label for="patient_id" class="block text-gray-700 text-sm font-medium mb-2">pasien id</label>
                  <input type="text" id="patient_id" name="patient_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="search bar(?)">
                </div>
                <div class="mb-4">
                  <label for="vaccination_date" class="block text-gray-700 text-sm font-medium mb-2">Tanggal vaksinasi</label>
                  <input type="date" id="vaccination_date" name="vaccination_date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
                </div>
                <div class="mb-4">
                  <label for="batch_number" class="block text-gray-700 text-sm font-medium mb-2">batch id/number</label>
                  <input type="text" id="batch_number" name="batch_number" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
                </div>

                <div class="mb-4">
                    <label for="notes" class="block text-gray-700 text-sm font-medium mb-2">Catatan</label>
                    <textarea rows="2" id="notes" name="notes" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Deskripsi obat"></textarea>
                  </div>
                <div class="mb-4">
                  <label for="next_dose" class="block text-gray-700 text-sm font-medium mb-2">Dosis berikut</label>
                  <input type="date" name="next_dose" id="next_dose" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="Harga obat">
                </div>
                  <div class="flex justify-center">
                    <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Submit</button>
                </div>
              </form>
            </div>
          </div>
</div>


@stop


