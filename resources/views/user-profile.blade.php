@extends('layouts.master')

@section('title','Profil User')

@section('content')

@extends('layouts.navigation-bar')

<div class="flex-inline h-max pt-5 py-5 bg-gray-300">
    <div class="w-3/4 mx-auto mt-10 bg-white shadow-md rounded-md overflow-hidden">
      <div class="px-6 py-4">
        <div class="p-4 flex justify-center items-center">
            <img class="w-32 h-32 rounded-full mr-4" src="{{ asset("images/" . Auth::user()->Employee->employee_photo) }}" alt="Profile Picture">
            <div>
              <h2 class="text-2xl font-semibold">{{Auth::user()->Employee->employee_name}}</h2>
              <p class="text-gray-600">{{Auth::user()->Employee->employee_job}}</p>
            </div>

          </div>

        <div class="mt-4">
          <h3 class="text-lg font-medium">Informasi</h3>
          <ul class="mt-2 text-gray-600">
            <li><span class="font-semibold">Jenis Kelamin : </span>{{Auth::user()->Employee->employee_gender}}</li>
            <li><span class="font-semibold">NIK :</span> {{Auth::user()->Employee->employee_NIK}}</li>
            <li><span class="font-semibold">DOB : </span>{{Auth::user()->Employee->employee_DOB}}</li>
            <li><span class="font-semibold">POB :</span> {{Auth::user()->Employee->employee_POB}}</li>
          </ul>
        </div>
        <div class="mt-4">
            <h3 class="text-lg font-medium">Alamat</h3>
            <p class="text-gray-600">{{Auth::user()->Employee->employee_address}}</p>

          </div>

        <div class="mt-4">
          <h3 class="text-lg font-medium">Contact</h3>
          <p class="text-gray-600"><span class="font-semibold">Email :</span> {{Auth::user()->Employee->employee_email}}</p>
          <p class="text-gray-600"><span class="font-semibold">No.Telp :</span> {{Auth::user()->Employee->employee_phone}}</p>
        </div>
      </div>
<div class="button-container">

  <div class="w-3/4 h-full mx-auto py-3 flex justify-center">
    <div x-data="{ open: false }">
      <button @click="open = true" class="rounded-lg font-medium bg-yellow-400 hover:bg-white hover:text-yellow-400 hover:outline hover:outline-yellow-400 outline-2 transition-all  text-sm px-5 py-2.5 mr-2 mb-2 text-center text-white"> Change Password </button>
      <div x-show="open">
        @livewire('change-password')
      </div>
  </div>
</div>

    </div>
    
    
        
  </div>
  
  </div>



@stop
@section('footer')
  @include('layouts.footer')
@endsection