@extends('layouts.master')

@section('title','Profil Karyawan')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="bg-gray-300">
<div class="container mx-auto p-4 bg-gray-300">
<div class="h-max py-4 flex items-center justify-center bg-gray-300">
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
      </div>
    </div>
  </div>
  <div class="flex justify-center">
    <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
      <a href="/edit-emp/{{$employee->id}}">Edit</a>
    </button>
  </div>
</div>
</div>
@stop
