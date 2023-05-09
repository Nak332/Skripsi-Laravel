@extends('layouts.master')

@section('title','Resepsi')

@section('content')


<div id="container-main" class="flex-inline bg-gray-200">

  <div id="header-page" class="flex justify-center">
    <p class="text-4xl font-bold-m4">Resepsi</p>
   
  

  </div>

  


  <div id="container-items" class="md:flex sm:flex-inline  justify-center space-x-4 content h-screen">
    <div id="container-antrian" class="flex-inline justify-center p-8 w-4/5 h-96">
      <h1 class="text-2xl font-bold mb-4">Antrian Pasien</h1>
      <div id="container-list-antrian" class="bg-white w-5/5 rounded-lg p-4 mb-4 overflow-y-auto h-full drop-shadow">
        <a href="#">
            <p class="bg-gray-300 p-3 m-4 rounded-lg hover:bg-blue-500 hover:ml-5 hover:mr-3 hover:text-white hover:transition-all">Row 1</p>
        </a>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
      </div>
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah</button>
    </div>




    <div id="container-kunjungan" class="flex-inline justify-end p-8 w-4/5 h-96 min-h-96">
      <h1 class="text-2xl font-bold mb-4">Kunjungan Janjian</h1>
      <div id="container-list-kunjungan" class="bg-white  rounded-lg p-4 mb-4 overflow-y-auto h-full drop-shadow">
        <a href="#">
            <p class="bg-gray-200 p-3 m-4 rounded-lg hover:transition-shadow">Row 1</p>
        </a>
        {{-- <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p>
        <p class="bg-gray-200 p-3 m-4 rounded-lg">Row 1</p> --}}
      </div>
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah</button>
    </div>
  </div>

</div>



@stop