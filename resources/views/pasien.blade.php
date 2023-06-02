@extends('layouts.master')

@section('title','Rekam medis')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="flex-inline pt-5 py-5 bg-gray-200">

    <div class="bg-white rounded-3xl shadow-md mx-auto w-3/4 p-8">
        <h1 class="text-2xl font-bold mb-4">Biodata</h1>

        <div class="grid grid-cols-2 gap-1">
          <div class="flex mb-2">
            <p class="block font-bold" for="name">Name : </p><p class="ml-2">{{$patient->patient_name}}</p>
          </div>

          <div class="flex mb-2">
            <p class="block font-bold mb-2" for="nik">NIK : </p><p class="ml-2">{{$patient->patient_NIK}}</p>
          </div>

          <div class="flex mb-2">
            <p class="block font-bold" for="gender">Jenis Kelamin : </p><p class="ml-2">{{$patient->patient_gender}}</p>
          </div>

          <div class="flex mb-2">
            <p class="block font-bold" for="address">Alamat : </p><p class="ml-2">{{$patient->patient_address}}</p>
          </div>

          <div class="flex mb-2">
            <p class="block font-bold" for="age">Umur : </p> <p class="ml-2">sample</p>
          </div>

          <div class="flex mb-2">
            <p class="block font-bold " for="phone">No. Telpon : </p><p class="ml-2"> {{$patient->patient_phone}}</p>
          </div>
          <div class="flex mb-2">
            <p class="block font-bold" for="dob">Tanggal Lahir : </p><p class="ml-2"> {{$patient->patient_DOB}}</p>
          </div>
        </div>
      </div>
      {{-- ini height (h) nya mainin aja --}}
    <div class="bg-white mt-12 h-full rounded-3xl shadow-md mx-auto w-3/4 p-8">
        <h1 class="text-2xl font-bold mb-4">Rekam Medis </h1>
        @foreach ($RekamMedis as $R)
        {{$R->id}}
        <br>
        @endforeach


    </div>

</div>


@stop
