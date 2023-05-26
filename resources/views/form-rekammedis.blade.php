@extends('layouts.master')

@section('title','Rekam medis')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="bg-gray-200">
  <div class="container mx-auto p-4">  
        <div class="min-h-screen flex items-center justify-center">
            <div class="max-w-screen-sm w-full mx-auto bg-white p-8 rounded-md shadow-md">
                <div class="drop-shadow flex-inline text-center text-black p-6 m-4 rounded-lg text-4xl w-128 h-fit">
                    <p class="font-bold text-black">Rekam Medis</p>
                    </div> 
              <form method="POST" action="#">
                {{-- @csrf --}}
                <div class="mb-4">
                  <label for="patient_id" class="block text-gray-700 text-sm font-medium mb-2">Pasien</label>
                  <input type="text" id="patient_id" name="patient_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Masukan .. pasien">
                </div>
                <div class="mb-4">
                  <label for="appointment_id" class="block text-gray-700 text-sm font-medium mb-2">Appointment</label>
                  <input type="text" id="appointment_id" name="appointment_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
                </div>
                <div class="mb-4">
                  <label for="medicine_id" class="block text-gray-700 text-sm font-medium mb-2">Medicine</label>
                  <input type="text" id="medicine_id" name="medicine_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Obat">
                </div>
                <div class="mb-4">
                    <label for="extramedicine_id" class="block text-gray-700 text-sm font-medium mb-2">Extra Medicine</label>
                    <input type="text" id="extramedicine_id" name="extramedicine_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
                  </div>
                <div class="mb-4">
                  <label for="employee_id" class="block text-gray-700 text-sm font-medium mb-2">Employee</label>
                  <input type="text" name="employee_id" id="employee_id" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                </div>
                <div class="mb-4">
                    <label for="symptoms" class="block text-gray-700 text-sm font-medium mb-2">Symptoms</label>
                    <input type="text" name="symptoms" id="symptoms" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                  </div>
                  <div class="mb-4">
                    <label for="disease" class="block text-gray-700 text-sm font-medium mb-2">Disease</label>
                    <input type="text" name="disease" id="disease" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                  </div>
                  <div class="mb-4">
                    <label for="total_price" class="block text-gray-700 text-sm font-medium mb-2">Total Price</label>
                    <input type="text" name="total_price" id="total_price" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                  </div>
                  <div class="mb-4">
                    <label for="type" class="block text-gray-700 text-sm font-medium mb-2">Type</label>
                    <input type="text"  name="type" id="type" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                  </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 text-sm font-medium mb-2">Note</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                  </div>

                  <div class="flex justify-center">
                    <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Submit</button>
                </div>
              </form>
            </div>
          </div>
        

    



</div>



@stop