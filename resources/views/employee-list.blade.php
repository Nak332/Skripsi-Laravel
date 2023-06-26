@extends('layouts.master')

@section('title','Daftar Karyawan')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="bg-gray-200">
  <div class=" bg-gray-200 min-h-screen">
    <div class="flex justify-center pt-8">
      <div class="w-4/5 flex items-center space-x-2">
        <div class="w-10 h-10">
          <x-fontisto-person />
        </div>
        <h1 class=" font-bold text-2xl">Daftar Karyawan</h1>
      </div>
     
    </div>
    <div class="mt-4 flex items-center justify-center">
      <hr class="h-0.5 w-4/5 block bg-gray-500">
    </div>
 

    <div class="flex justify-center pt-12">
        <div class="w-4/5">
          <form action="/tambah-karyawan" method="get">
            <button class="bg-green-500 text-white font-bold rounded-lg p-4 "> + Tambah Karyawan</button>
        </form>

        </div>
    </div>

    <div class="flex justify-center pt-12 pb-4">

        <div class="w-4/5 h-fit">
          @livewire('employees-table')
        </div>





    </div>


  </div>



</div>




@stop
@section('footer')
  @include('layouts.footer')
@endsection
