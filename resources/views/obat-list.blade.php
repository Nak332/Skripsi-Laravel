@extends('layouts.master')

@section('title','Daftar Karyawan')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="bg-gray-200">
  <div class=" bg-gray-200 min-h-screen">

    <div class="flex justify-center pt-12">
        <div class="w-4/5">
          <form action="/tambah-obat" method="get">
            <button class="bg-green-500 text-white font-bold rounded-lg p-4 "> + Tambah Obat</button>
        </form>
  
        </div>
    </div>
  
    <div class="flex justify-center pt-12 pb-4">
  
        <div class="w-4/5 h-fit">
          @livewire('medicine-detail-table')
        </div>
  
  
  
  
  
    </div>
  
  
  </div>



</div>




@stop