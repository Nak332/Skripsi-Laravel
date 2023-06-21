@extends('layouts.master')

@section('title','Profil Karyawan')

@section('content')

@extends('layouts.navigation-bar')

<div class="bg-gray-300">
  
<div class="min-h-screen container mx-auto p-4 bg-gray-300">
  
  
<div class=" pb-4 flex items-center justify-center bg-gray-300">
  
    <div class="w-3/4 mx-auto bg-white shadow-md rounded-md overflow-hidden">
      <div class="px-6 py-4">
        <div class="p-4 flex justify-center items-center">
            <img class="w-32 h-32 rounded-full mr-4" src="profile-picture.jpg" alt="Profile Picture">
            <div>
              <h2 class="text-2xl font-semibold">{{$employee->employee_name}}</h2>
              <p class="text-gray-600">{{$employee->employee_job}}</p>
            </div>
            
          </div>
        
        <div class="mt-4">
          <h3 class="text-lg font-medium">Informasi</h3>
          <ul class="mt-2 list-disc list-inside text-gray-600">
            <li>Jenis Kelamin: {{$employee->employee_gender}}</li>
            <li>NIK: {{$employee->employee_NIK}}</li>
            <li>DOB: {{$employee->employee_DOB}}</li>
            <li>POB: {{$employee->employee_POB}}</li>
          </ul>
        </div>
        <div class="mt-4">
            <h3 class="text-lg font-medium">Alamat</h3>
            <p class="text-gray-600">{{$employee->employee_address}}</p>

          </div>

        <div class="mt-4">
          <h3 class="text-lg font-medium">Contact</h3>
          <p class="text-gray-600">Email: {{$employee->employee_email}}</p>
          <p class="text-gray-600">No.Telp : {{$employee->employee_phone}}</p>
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

</div>
</div>
@stop
