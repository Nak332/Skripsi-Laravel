@extends('layouts.master')

@section('title','Edit Obat')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="bg-gray-200">
  <div class="container mx-auto p-4">
        <div class="min-h-screen flex items-center justify-center">
            <div class="max-w-screen-sm w-full mx-auto bg-white p-8 rounded-md shadow-md">
                <div class="drop-shadow flex-inline text-center text-black p-6 m-4 rounded-lg text-4xl w-128 h-fit">
                    <p class="font-bold text-black">Edit Obat</p>
                    </div>
              <form method="POST" action="/edit-obat/{{$medicine->id}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                  <label for="medicine_name" class="block text-gray-700 text-sm font-medium mb-2">Nama</label>
                  <input type="text" id="medicine_name" name="medicine_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" value="{{$medicine->medicine_name}}" placeholder="Nama obat">
                </div>
                @error('medicine_name')
                <div class="error text-red-600">{{ $message }}</div>
                @enderror
                <div class="mb-4">
                    <label for="medicine_description" class="block text-gray-700 text-sm font-medium mb-2">Deskripsi</label>
                    <textarea rows="2" id="medicine_description" name="medicine_description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Deskripsi obat">{{$medicine->medicine_description}}</textarea>
                    @error('medicine_description')
                    <div class="error text-red-600">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="mb-4">
                  <label for="medicine_price" class="block text-gray-700 text-sm font-medium mb-2">Harga</label>
                  <input type="text" name="medicine_price" id="medicine_price" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" value="{{$medicine->medicine_price}}" placeholder="">
                  @error('patient_phone')
                  <div class="error text-red-600">{{ $message }}</div>
                  @enderror
                </div>
                  <div class="flex justify-center">
                    <button type="submit" class="rounded-lg font-medium bg-yellow-400 hover:bg-white hover:text-yellow-400 hover:outline hover:outline-yellow-400 outline-2 transition-all px-5 py-2.5 mr-2 mb-2 text-center text-white">Update</button>
                </div>
              </form>
            </div>
          </div>






</div>



@stop
@section('footer')
  @include('layouts.footer')
@endsection