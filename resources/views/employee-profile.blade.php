@extends('layouts.master')

@section('title','Profil Karyawan')

@section('content')

@extends('layouts.navigation-bar')
  
<div class="flex-inline h-max pt-5 py-5 bg-gray-300">
  
    <div class="w-3/4 mx-auto mt-10 bg-white shadow-md rounded-md overflow-hidden">
      <div class="px-6 py-4">
        <div class="p-4 flex justify-center items-center">
            <img class="w-32 h-32 rounded-full mr-4" src="{{ asset("images/" . $employee->employee_photo) }}" alt="Profile Picture">
            <div>
              <h2 class="text-2xl font-semibold">{{$employee->employee_name}}</h2>
              <p class="text-gray-600">{{$employee->employee_job}}</p>
            </div>
            
          </div>
        
          <div class="mt-4">
            <h3 class="text-lg font-medium">Informasi</h3>
            <ul class="mt-2 text-gray-600">
              <li><span class="font-semibold">Jenis Kelamin : </span>{{$mployee->employee_gender}}</li>
              <li><span class="font-semibold">NIK :</span> {{$employee->employee_NIK}}</li>
              <li><span class="font-semibold">DOB : </span>{{$employee->employee_DOB}}</li>
              <li><span class="font-semibold">POB :</span> {{$employee->employee_POB}}</li>
            </ul>
          </div>
          <div class="mt-4">
        <div class="mt-4">
            <h3 class="text-lg font-medium">Alamat</h3>
            <p class="text-gray-600">{{$employee->employee_address}}</p>

          </div>

        <div class="mt-4">
          <h3 class="text-lg font-medium">Contact</h3>
          <p class="text-gray-600"><span class="font-semibold">Email:</span> {{$employee->employee_email}}</p>
          <p class="text-gray-600"><span class="font-semibold">No.Telp :</span> {{$employee->employee_phone}}</p>
        </div>
        <div class="button-container">
          <div class="flex justify-end">
            <div>
              <a href="/edit-emp/{{$employee->id}}">
              <button class="rounded-full bg-yellow-400 hover:bg-white hover:text-yellow-400 hover:outline hover:outline-yellow-400 outline-2 transition-all  ml-2 px-3 py-1 text-center text-white"> <x-far-edit class=" w-6 h-6" /></button></a>
            </div>
            <div x-data="{ open: false }">
              <button @click="open = true" class="rounded-full bg-red-500 hover:bg-white hover:text-red-500 hover:outline hover:outline-red-500 outline-2 transition-all  ml-2 px-3 py-1 text-center text-white"> <x-feathericon-alert-triangle class=" w-6 h-6" /> </button>
              <div wire:model='' x-show="open">
                @livewire('deactivate-employee',['employee'=>$employee])
              </div>
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
