@extends('layouts.master')

@section('title','Resepsi')

@section('content')

@extends('layouts.navigation-bar')

<style>
    .textbox{
        width: 600px;
        height:50px;
    }

    .longertext{
        width: 600px;
        height:125px;
    }
</style>


<div id="container-main" class="flex-inline bg-gray-200">

  <div id="header-page" class="flex justify-center">
    <div class="drop-shadow flex-inline text-center   text-black p-6 m-4 rounded-lg text-4xl w-128 h-fit">
    <p class="font-bold  mt-2 p-5 truncate text-black">Rekam Medis</p>
    </div> 
  </div>
  <div class="grid justify-items-start">
    <form class="space-y-4 md:space-y-6" method="POST" action="#">
        {{-- @csrf --}}
        <div class="ml-40">
            <label for="patient_id" class="block mb-2 text-sm font-medium  text-black">Pasien</label>
            <input type="text" name="patient_id" id="patiend_id" class="bg-gray-50 border border-gray-300 text-gray-900 textbox sm:text-sm rounded-lg   block w-full p-2.5 bg-white dark:border-gray-600  text-black " placeholder="" required="">

        </div>
        <div class="ml-40">
            <label for="appointment_id" class="block mb-2 text-sm font-medium  text-black">Appointment</label>
            <input type="text" name="appointment_id" id="appointment_id" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 textbox sm:text-sm rounded-lg focus:ring-primary-800 focus:border-primary-600 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400" required="">
        </div>
        <div class="ml-40">
            <label for="medicine_id" class="block mb-2 text-sm font-medium  text-black">Medicine</label>
            <input type="text" name="medicine_id" id="medicine_id" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 textbox sm:text-sm rounded-lg focus:ring-primary-800 focus:border-primary-600 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400" required="">
        </div>
        <div class="ml-40">
            <label for="extramedicine_id" class="block mb-2 text-sm font-medium  text-black">Extra Medicine</label>
            <input type="text" name="extramedicine_id" id="extramedicine_id" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 textbox sm:text-sm rounded-lg focus:ring-primary-800 focus:border-primary-600 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400" required="">
        </div>
        <div class="ml-40">
            <label for="employee_id" class="block mb-2 text-sm font-medium  text-black">Employee</label>
            <input type="text" name="employee_id" id="employee_id" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 textbox sm:text-sm rounded-lg focus:ring-primary-800 focus:border-primary-600 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400" required="">
        </div>
        <div class="ml-40">
            <label for="symptoms" class="block mb-2 text-sm font-medium  text-black">Symptoms</label>
            <input type="text" name="symptoms" id="symptoms" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 textbox sm:text-sm rounded-lg focus:ring-primary-800 focus:border-primary-600 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400" required="">
        </div>
        <div class="ml-40">
            <label for="disease" class="block mb-2 text-sm font-medium  text-black">Disease</label>
            <input type="text" name="disease" id="disease" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 textbox sm:text-sm rounded-lg focus:ring-primary-800 focus:border-primary-600 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400" required="">
        </div>
        <div class="ml-40">
            <label for="total_price" class="block mb-2 text-sm font-medium  text-black">Total Price</label>
            <input type="text" name="total_price" id="total_price" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 textbox sm:text-sm rounded-lg focus:ring-primary-800 focus:border-primary-600 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400" required="">
        </div>
        <div class="ml-40">
            <label for="text" class="block mb-2 text-sm font-medium  text-black">Type</label>
            <input type="text" name="type" id="type" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 textbox sm:text-sm rounded-lg focus:ring-primary-800 focus:border-primary-600 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400" required="">
        </div>
        <div class="ml-40">
            <label for="note" class="block mb-2 text-sm font-medium  text-black">Note</label>
            <textarea name="note" id="note" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 longertext text-clip rounded-lg focus:ring-primary-800 focus:border-primary-600 bg-white dark:border-gray-600 dark:placeholder-gray-400" required=""></textarea>
        </div>
        <div class="ml-40">
            <label for="icd10" class="block mb-2 text-sm font-medium  text-black">ICD10</label>
            <input type="text" name="icd10" id="icd10" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 textbox sm:text-sm rounded-lg focus:ring-primary-800 focus:border-primary-600 block w-full p-2.5 bg-white dark:border-gray-600 dark:placeholder-gray-400" required="">
        </div>
    </div>
        <div class="flex justify-center py-6">
            <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Submit</button>
        </div>

    </form>
  
  



</div>



@stop