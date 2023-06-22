@extends('layouts.master')

@section('title','Tambah Pasien')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="bg-gray-200">
  <div class="container mx-auto p-4">
        <div class="min-h-screen flex items-center justify-center">
            <div class="max-w-screen-sm w-full mx-auto bg-white p-8 rounded-md shadow-md">
                <div class="drop-shadow flex-inline text-center text-black p-6 m-4 rounded-lg text-4xl w-128 h-fit">
                    <p class="font-bold text-black">Tambah Pasien</p>
                    </div>
              <form method="POST" action="/tambah-pasien/tambah" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                  <label for="patient_name" class="block text-gray-700 text-sm font-medium mb-2">Nama</label>
                  <input type="text" id="patient_name" name="patient_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
                  @error('patient_name')
                  <div class="error text-red-600">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="patient_gender" class="block text-gray-700 text-sm font-medium mb-2">Jenis Kelamin</label> 
                      <input type="radio" id="pria" name="patient_gender" value="pria" class="mr-2">
                      <label for="pria" class="mr-4">Pria</label>
                      <input type="radio" id="wanita" name="patient_gender" value="wanita" class="mr-2">
                      <label for="wanita">Wanita</label>
                    @error('patient_gender')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-4">
                    <label for="patient_NIK" class="block text-gray-700 text-sm font-medium mb-2">NIK</label>
                    <input type="text" id="patient_NIK" name="patient_NIK" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
                    @error('patient_NIK')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="mb-4">
                  <label for="patient_alias" class="block text-gray-700 text-sm font-medium mb-2">Nama alias</label>
                  <input type="text" id="patient_alias" name="patient_alias" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="patient_phone" class="block text-gray-700 text-sm font-medium mb-2">No. Telpon</label>
                    <input type="text" name="patient_phone" id="patient_phone" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" value="+62">
                    @error('patient_phone')
                        <div class="error text-red-600">{{ $message }}</div>
                        @enderror
                  </div>
                <div class="mb-4">
                    <label for="patient_address" class="block text-gray-700 text-sm font-medium mb-2">Alamat</label>
                    <textarea rows="2" id="patient_address" name="patient_address" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                    @error('patient_address')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="patient_DOB" class="block text-gray-700 text-sm font-medium mb-2">Tanggal Lahir</label>
                    <input type="date" name="patient_DOB" id="patient_DOB" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
                    @error('patient_DOB')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="patient_POB" class="block text-gray-700 text-sm font-medium mb-2">Tempat Lahir</label>
                    <textarea rows="2" id="patient_POB" name="patient_POB" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
                    @error('patient_POB')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="patient_marital_status" class="block text-gray-700 text-sm font-medium mb-2">Status Perkawinan</label>
                    <select name = "patient_marital_status" id="patient_marital_status" class="border border-gray-300 rounded-md p-2">
                      <option hidden disabled selected class="pl-4 py-2">-- Pilih status --</option>
                      <option value="Belum Kawin" class="pl-4 py-2">Belum kawin</option>
                      <option value="Kawin" class="pl-4 py-2">Kawin</option>
                      <option value="Cerai Hidup" class="pl-4 py-2">Cerai Hidup</option>
                      <option value="Cerai Mati" class="pl-4 py-2">Cerai Mati</option>
                    </select>
                    @error('patient_marital_status')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <h1 class="text-2xl font-semibold">Kontak Darurat</h1>
                    </div>
                    <div class="mb-4">
                        <label for="patient_emergency_contact_name" class="block text-gray-700 text-sm font-medium mb-2">Nama</label>
                        <input type="text" id="patient_emergency_contact_name" name="patient_emergency_contact_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
                        @error('patient_emergency_contact_name')
                        <div class="error text-red-600">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-4">
                        <label for="patient_emergency_contact_phone" class="block text-gray-700 text-sm font-medium mb-2">No.telpon</label>
                        <input type="text" id="patient_emergency_contact_phone" name="patient_emergency_contact_phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="">
                        @error('patient_emergency_contact_phone')
                        <div class="error text-red-600">{{ $message }}</div>
                        @enderror
                      </div>

                  <div class="flex justify-center">
                    <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Submit</button>
                </div>
              </form>
            </div>
          </div>






</div>



@stop
@section('footer')
  @include('layouts.footer')
@endsection
