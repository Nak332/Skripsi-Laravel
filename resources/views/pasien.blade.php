@extends('layouts.master')

@section('title','Rekam medis')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="flex-inline pt-5 py-5 bg-gray-200">
   
    <div class="bg-white rounded-3xl shadow-md mx-auto w-3/4 p-8">
        <h1 class="text-2xl font-bold mb-4">Biodata</h1>
  
        <div class="grid grid-cols-2 gap-1">
          <div>
            <p class="block font-bold mb-2" for="name">Name :</p>
          </div>

          <div>
            <p class="block font-bold mb-2" for="nik">NIK :</p> 
          </div>

          <div>
            <p class="block font-bold mb-2" for="gender">Jenis Kelamin :</p>
          </div>

          <div>
            <p class="block font-bold mb-2" for="address">Alamat :</p>
          </div>

          <div>
            <p class="block font-bold mb-2" for="age">Umur :</p>
          </div>
          
          <div>
            <p class="block font-bold mb-2" for="phone">No. Telpon :</p>
          </div>
          <div>
            <p class="block font-bold mb-2" for="dob">Tanggal Lahir :</p>
          </div>
          
        </div>
      </div>
      {{-- ini height (h) nya mainin aja --}}
    <div class="bg-white mt-12 h-full rounded-3xl shadow-md mx-auto w-3/4 p-8">
        <h1 class="text-2xl font-bold mb-4">Rekam Medis</h1>  
    </div>
  
</div>


@stop