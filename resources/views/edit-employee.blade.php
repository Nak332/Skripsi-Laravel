@extends('layouts.master')

@section('title','Employee Register')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="bg-gray-200">
  <div class="container mx-auto p-4">
        <div class="min-h-screen flex items-center justify-center">
            <div class="max-w-screen-sm w-full mx-auto bg-white p-8 rounded-md shadow-md">
                <div class="drop-shadow flex-inline text-center text-black p-6 m-4 rounded-lg text-4xl w-128 h-fit">
                    <p class="font-bold text-black">Employee Edit</p>
                    </div>
              <form method="POST" action="/edit-emp/edit/{{$employee->id}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                  <label for="employee_name" class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                  <input type="text" id="employee_name" name="employee_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Nama Karyawan" value="{{$employee->employee_name}}">
                </div>
                @error('employee_name')
                  <div class="error text-red-600">{{ $message }}</div>
                  @enderror
                  <div class="mb-4">
                    <label for="employee_job" class="block text-gray-700 text-sm font-medium mb-2">Job</label>
    
                    <select name = "employee_job" id="employee_job" class="border border-gray-300 rounded-md p-2">
                      <option hidden selected value="{{$employee->employee_job}}" class="pl-4 py-2 text-gray-300">{{$employee->employee_job}}</option>
                      <option value="Dokter" class="pl-4 py-2">Dokter</option>
                      <option value="Perawat" class="pl-4 py-2">Perawat</option>
                      <option value="Farmasi" class="pl-4 py-2">Farmasi</option>
                      <option value="Farmasi" class="pl-4 py-2">Resepsionis</option>
                    </select>
                    @error('employee_job')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="employee_gender" class="block text-gray-700 text-sm font-medium mb-2">Job</label>
                    <select name = "employee_gender" id="employee_gender" class="border border-gray-300 rounded-md p-2">
                      <option hidden selected value="{{$employee->employee_gender}}" class="pl-4 py-2 text-gray-300">{{$employee->employee_gender}}</option>
                      <option value="Pria" class="pl-4 py-2">Pria</option>
                      <option value="Wanita" class="pl-4 py-2">Wanita</option>
                    </select>
                    @error('employee_gender')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="mb-4">
                    <label for="employee_NIK" class="block text-gray-700 text-sm font-medium mb-2">NIK</label>
                    <input type="text" id="employee_NIK" name="employee_NIK" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="NIK" value="{{$employee->employee_NIK}}">
                    @error('employee_NIK')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="mb-4">
                  <label for="employee_address" class="block text-gray-700 text-sm font-medium mb-2">Address</label>
                  <input type="text" name="employee_address" id="employee_address" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="Alamat" value="{{$employee->employee_address}}">
                  @error('employee_address')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="mb-4">
                    <label for="employee_phone" class="block text-gray-700 text-sm font-medium mb-2">Phone</label>
                    <input type="text" name="employee_phone" id="employee_phone" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="No. telpon" value="{{$employee->employee_phone}}">
                    @error('employee_phone')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="employee_DOB" class="block text-gray-700 text-sm font-medium mb-2">Date of Birth</label>
                    <input type="date" name="employee_DOB" id="employee_DOB" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="" value="{{$employee->employee_DOB}}">
                    @error('employee_DOB')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="mb-4">
                    <label for="employee_POB" class="block text-gray-700 text-sm font-medium mb-2">Place of Birth</label>
                    <textarea rows="2" name="employee_POB" id="employee_POB" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="" >{{$employee->employee_POB}}</textarea>
                    @error('employee_POB')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="employee_email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <input type="email"  name="employee_email" id="employee_email" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="" value="{{$employee->employee_email}}">
                  </div>
                  @error('employee_email')
                  <div class="error text-red-600">{{ $message }}</div>
                  @enderror
                 
                  <div>
                    <label for="employee_photo" class="block text-gray-700 text-sm font-medium mt-3 mb-2">Photo</label>
                    <input type="file" name="image" id="image">
                  </div>
                  @error('employee_photo')
                  <div class="error text-red-600">{{ $message }}</div>
                  @enderror


                  <div class="flex justify-center">
                    <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mt-3 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
          <div class="h-max flex items-center justify-center py-4">
            <div class="max-w-screen-sm w-full mx-auto bg-white p-8 rounded-md shadow-md">
              <div class="drop-shadow flex-inline text-center text-black p-6 m-4 rounded-lg text-3xl w-128 h-fit">
                <p class="font-bold text-black">Reset Password</p>
                </div>
              <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2" for="email">
                  Password
                </label>
                <input
                  class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                  id="password" name="password" type="password" placeholder="" required>
              </div>
              <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2" for="email">
                  Confirm Password
                </label>
                <input
                  class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
                  id="confirm_password" name="confirm_password" type="password" placeholder="" required>
              </div>
              <div class="flex w-full mx-auto items-center justify-center">
                 <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mt-3 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Submit</button>
            </div>
          </div>
        </div>






</div>



@stop
