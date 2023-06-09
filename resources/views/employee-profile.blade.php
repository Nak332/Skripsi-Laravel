@extends('layouts.master')

@section('title','Profil Karyawan')

@section('content')

@extends('layouts.navigation-bar')

<div class="min-h-screen flex items-center justify-center bg-gray-300">
    <div class="w-3/4 mx-auto bg-white shadow-md rounded-md overflow-hidden">
      <div class="px-6 py-4">
        <div class="p-4 flex justify-center items-center">
            <img class="w-32 h-32 rounded-full mr-4" src="profile-picture.jpg" alt="Profile Picture">
            <div>
              <h2 class="text-2xl font-semibold">John Doe</h2>
              <p class="text-gray-600">Software Engineer</p>
            </div>
          </div>
        
        <div class="mt-4">
          <h3 class="text-lg font-medium">Informasi</h3>
          <ul class="mt-2 list-disc list-inside text-gray-600">
            <li>Jenis Kelamin</li>
            <li>NIK</li>
            <li>DOB</li>
            <li>POB</li>
          </ul>
        </div>
        <div class="mt-4">
            <h3 class="text-lg font-medium">Alamat</h3>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis mi vel tellus rhoncus, in lobortis mauris mollis</p>
    
          </div>
        
        <div class="mt-4">
          <h3 class="text-lg font-medium">Contact</h3>
          <p class="text-gray-600">Email: something@mail.com</p>
          <p class="text-gray-600">No.Telp : 03453895234</p>
        </div>
      </div>
    </div>
  </div>
        

    



</div>



@stop