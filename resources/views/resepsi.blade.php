@extends('layouts.master')

@section('title','Resepsi')

@section('content')

@livewire('navigation-bar')


<div id="container-main" class="h-fit flex-inline bg-gray-200">

  <div id="header-page" class="flex justify-center">
    <div id="current queue" class="drop-shadow flex-inline text-center  text-black p-6 m-4 rounded-lg text-4xl w-128 h-fit">
    {{-- <p class="">Antrian sekarang:</p> --}}
    <p class="font-bold bg-blue-400 rounded-lg mt-2 p-5 text-white">A5 - Satria Narayana</p>
    </div>
    
   

  </div>

  


  <div id="container-items-atas" class="md:flex sm:flex-inline ml-16 mr-16  justify-center space-x-4 content h-fit">
    
  
      @livewire('antrian-list')
      @livewire('antrian-list')    


    
    
 



    {{--   
        <div id="container-kunjungan" class="flex-inline justify-end p-8 w-4/5 h-fit">
          <h1 class="text-2xl font-bold mb-4">Kunjungan Janjian</h1>
          <div id="container-list-kunjungan" class="bg-white rounded-lg p-4 mb-4 overflow-y-auto h-96 drop-shadow">
            <a href="#">
                <p class="bg-gray-200 p-3 m-4 rounded-lg hover:transition-shadow">Row 1</p>
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
        </div>  --}}
  </div>

  {{-- ///////////////////////////////////// Container Bawah //////////////////////////////////////--}}
  <div id="container-items-atas" class="md:flex sm:flex-inline ml-16 mr-16  justify-center space-x-4 content h-fit">
    
    @livewire('antrian-list')  




    <div id="filler" class="flex-inline justify-end p-8 w-4/5 h-fit"></div>

  

</div>



@stop