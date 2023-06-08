@extends('layouts.master')

@section('title','Detail Pasien')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="flex-inline pt-5 py-5 bg-gray-100 space-y-8 min-h-screen">

    <div id="container-biodata" class="bg-white rounded-3xl shadow-md h-fit mx-auto w-3/4 p-8">


        <h1 class="text-2xl font-bold mb-4 truncate">Biodata</h1>




        <div class="grid truncate md:grid-cols-2 grid-cols-1 gap-1">
          <div class="flex mb-2">
            <p class="block font-bold" for="name">Name : </p><p class="ml-2 truncate">{{$patient->patient_name}}</p>
          </div>
          @if(Auth::user()->role=="admin" or Auth::user()->role=="dokter" )
          <div class="flex mb-2">
            <p class="block font-bold" for="nik">NIK : </p><p class="ml-2 truncate">{{$patient->patient_NIK}}</p>
          </div>

          @endif

          <div class="flex mb-2">
            <p class="block font-bold" for="nik">Alias : </p><p class="ml-2 truncate">{{$patient->patient_alias}}</p>
          </div>

          <div class="flex mb-2">
            <p class="block font-bold" for="gender">Jenis Kelamin : </p><p class="ml-2 truncate">{{$patient->patient_gender}}</p>
          </div>

          <div class="flex mb-2">
            <p class="block font-bold" for="address">Alamat : </p><p class="ml-2 truncate">{{$patient->patient_address}}</p>
          </div>

          <div class="flex mb-2">
            <p class="block font-bold" for="age">Umur : </p> <p class="ml-2 truncate">{{$patient->getage()}}</p>
          </div>

          <div class="flex mb-2">
            <p class="block font-bold" for="name">Status Perkawinan : </p><p class="ml-2 truncate">{{$patient->patient_marital_status}}</p>
          </div>

          <div class="flex mb-2">
            <p class="block font-bold " for="phone">No. Telpon : </p><p class="ml-2 truncate"> {{$patient->patient_phone}}</p>
          </div>
          <div class="flex mb-2">
            <p class="block font-bold" for="dob">Tanggal Lahir : </p><p class="ml-2 truncate"> {{$patient->patient_DOB}}</p>
          </div>

        </div>
        <div class="py-4">
          <hr>
        </div>


        <h1 class="text-2xl font-bold mb-4 truncate">Kontak Darurat</h1>
        <div class="grid md:grid-cols-2 grid-cols-1 gap-1">
          <div class="flex mb-2 truncate">
            <p class="block font-bold" for="dob">Nama : </p><p class="ml-2"> {{$patient->patient_emergency_contact_name}}</p>
          </div>
            <div class="flex mb-2 truncate">
              <p class="block font-bold" for="dob">No. Telpon : </p><p class="ml-2"> {{$patient->patient_emergency_contact_phone}}</p>
            </div>
          </div>
        </div>


      {{-- ini height (h) nya mainin aja --}}


      <div id="container-rekam-imunisasi" class="md:flex justify-center  mx-auto w-3/4 ">

        <div class="flex-inline md:w-1/2  md:mr-4 p-4 bg-white rounded-3xl shadow-md">
          <div class="flex justify-between pb-6">
            <h1 class="text-2xl font-bold mb-4 truncate">Rekam Medis </h1>
            <form action="/form-rekam/{{$patient->id}}" method="get">
                <button class="text-xl text-white font-bold bg-green-500 hover:bg-green-700 transition-all rounded-lg p-2">
                    <h1 >+ Tambah Rekam</h1>
                  </button>
            </form>


          </div>

          <div class="overflow-y-auto h-fit  max-h-96">

            @foreach ($RekamMedis as $R)

            <div onclick="Livewire.emit('openModal', 'card-rekammedis', {{json_encode(['Rekam' => $R])}})"
            class="p-4 rounded-lg text-white transition-all cursor-pointer {{$R->flag =='1' ?  'bg-blue-500 hover:bg-blue-300' : 'bg-red-500  hover:bg-red-300' }} ">
            <p class=" truncate font-bold">{{$R->created_at}}</p>
            <p class="truncate">Diagnosis: {{$R->diagnosis}}</p>
            </div>





            <br>
           @endforeach
          </div>

        </div>

        <div class="flex-inline md:w-1/2  md:ml-4 p-4 bg-white rounded-3xl shadow-md">
          <div class="flex justify-between pb-6">
            <h1 class="text-2xl font-bold mb-4 truncate">Riwayat Imunisasi </h1>
            <button class="text-xl text-white font-bold bg-green-500 hover:bg-green-700 transition-all rounded-lg p-2">
              <h1 >+ Tambah Riwayat</h1>
            </button>

          </div>

          <div class="overflow-y-auto h-fit  max-h-96">

            @foreach ($RekamMedis as $R)

            <div class="p-4 rounded-lg text-white transition-all cursor-pointer {{$R->flag =='1' ?  'bg-blue-500 hover:bg-blue-300' : 'bg-red-500  hover:bg-red-300' }} ">
            <p class=" truncate font-bold">{{$R->created_at}}</p>
            <p class="truncate">Diagnosis: {{$R->diagnosis}}</p>
            </div>





            <br>
           @endforeach
          </div>

        </div>











    </div>

</div>


@stop
