@extends('layouts.master')

@section('title','Tambah Karyawan')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="bg-gray-200">
  <div class="container mx-auto p-4">
        <div class="min-h-screen flex items-center justify-center">
            <div class="max-w-screen-sm w-full mx-auto bg-white p-8 rounded-md shadow-md">
                <div class="drop-shadow flex-inline text-center text-black p-6 m-4 rounded-lg text-4xl w-128 h-fit">
                    <p class="font-bold text-black">Tambah Karyawan</p>
                    </div>
                    {{-- @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif --}}
              <form method="POST" action="add-employee" enctype="multipart/form-data">
                @csrf
                <div><span class="text-sm text-red-500"> *Wajib diisi</span> </div><br>
                <div class="mb-4">
                  <label for="employee_name" class="block text-gray-700 text-sm font-medium mb-2">Name<span class="text-red-500">*</span>
                  </label>
                  <input type="text" id="employee_name" name="employee_name" class="flex w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Nama Karyawan" value="{{old('employee_name')}}">

                  @error('employee_name')
                  <div class="text-xs text-red-600">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="employee_job" class="block text-gray-700 text-sm font-medium mb-2">Job<span class="text-red-500">*</span></label>
                <div class="mb-4">

                  <select name = "employee_job" id="employee_job" class="border border-gray-300 rounded-md p-2">

                    <option hidden selected class ="pl-4 py-2" value="{{old('employee_job')}}">{{old('employee_job') ?: '-- Pilih Pekerjaan --'}}</option>
                    <option value="Dokter" class="pl-4 py-2">Dokter</option>
                    <option value="Perawat" class="pl-4 py-2">Perawat</option>
                    <option value="Farmasi" class="pl-4 py-2">Farmasi</option>
                    <option value="Resepsionis" class="pl-4 py-2">Resepsionis</option>
                  </select>
                  @error('employee_job')
                  <div class="text-xs text-red-600">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                  <label for="employee_gender" class="block text-gray-700 text-sm font-medium mb-2">Gender<span class="text-red-500">*</span></label>
                    <input type="radio" id="pria" name="employee_gender" id="employee_gender" value="pria" class="mr-2"
                    {{ old('employee_gender') === 'pria' ? 'checked' : '' }}>
                    <label for="pria" class="mr-4">Pria</label>
                    <input type="radio" id="wanita" name="employee_gender" id="employee_gender" value="wanita" class="mr-2"
                    {{ old('employee_gender') === 'wanita' ? 'checked' : '' }}>
                    <label for="wanita">Wanita</label>
                  @error('employee_gender')
                  <div class="text-xs text-red-600">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-4">
                    <label for="employee_NIK" class="block text-gray-700 text-sm font-medium mb-2">NIK<span class="text-red-500">*</span></label>
                    <input type="text" id="employee_NIK" name="employee_NIK" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="NIK" value="{{old('employee_NIK')}}">

                    @error('employee_NIK')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="mb-4">
                  <label for="employee_address" class="block text-gray-700 text-sm font-medium mb-2">Address<span class="text-red-500">*</span></label>
                  <textarea rows="2" name="employee_address" id="employee_address" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="Alamat">{{old('employee_address')}}</textarea>
                  @error('employee_address')
                  <div class="text-xs text-red-600">{{ $message }}</div>
                  @enderror
                </div>
                  <div class="mb-4">
                    <label for="employee_phone" class="block text-gray-700 text-sm font-medium mb-2">Phone<span class="text-red-500">*</span></label>
                    <input type="text" name="employee_phone" id="employee_phone" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300"
                    value="{{old('employee_phone')}}">
                    @error('employee_phone')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="employee_DOB" class="block text-gray-700 text-sm font-medium mb-2">Date of Birth<span class="text-red-500">*</span></label>
                    <input type="date" name="employee_DOB" id="employee_DOB" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" value="{{old('employee_DOB')}}">

                    @error('employee_DOB')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="mb-4">
                    <label for="employee_POB" class="block text-gray-700 text-sm font-medium mb-2">Place of Birth<span class="text-red-500">*</span></label>
                    <textarea rows="2" name="employee_POB" id="employee_POB" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="Tempat Lahir">{{old('employee_POB')}}</textarea>
                    @if(!session('submitted'))

                  @endif
                    @error('employee_POB')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="employee_email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <input type="text"  name="employee_email" id="employee_email" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="email"
                    value="{{old('employee_email')}}">
                    @error('employee_email')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-4">
                    <label for="employee_photo" class="block text-gray-700 text-sm font-medium mb-2">Photo</label>
                    <input type="file" name="image" id="image">
                  </div>


                  <div class="flex justify-center">
                    <button type="submit" class="rounded-lg font-medium bg-green-500 hover:bg-white hover:text-green-500 hover:outline hover:outline-green-500 outline-2 transition-all  text-sm px-5 py-2.5 mr-2 mb-2 text-center text-white">Submit</button>
                </div>
              </form>
            </div>
          </div>






</div>



@stop
@section('footer')
  @include('layouts.footer')
@endsection
