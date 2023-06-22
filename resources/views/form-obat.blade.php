@extends('layouts.master')

@section('title','Tambah Obat')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="bg-gray-200">
  <div class="container mx-auto p-4">
        <div class="min-h-screen flex items-center justify-center">
            <div class="max-w-screen-sm w-full mx-auto bg-white p-8 rounded-md shadow-md">
                <div class="drop-shadow flex-inline text-center text-black p-6 m-4 rounded-lg text-4xl w-128 h-fit">
                    <p class="font-bold text-black">Add Medicine</p>
                    </div>
              <form method="POST" action="tambah-obat/tambah" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                  <label for="medicine_name" class="block text-gray-700 text-sm font-medium mb-2">Nama</label>
                  <input type="text" id="medicine_name" name="medicine_name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Nama obat"
                  title="Masukkan nama obat">
                  @error('medicine_name') <span class="error text-red-500">{{$message}}</span> @enderror
                </div>
               
               
                <div class="mb-4">
                    <label for="medicine_description" class="block text-gray-700 text-sm font-medium mb-2">Deskripsi</label>
                    <textarea rows="2" id="medicine_description" name="medicine_description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Deskripsi obat"
                    pattern="^[a-zA-Z\s]+$" title="Masukkan deskripsi"></textarea>
                    @error('medicine_description') <span class="error text-red-500">{{$message}}</span> @enderror
                  </div>
                <div class="mb-4">
                  <label for="medicine_price" class="block text-gray-700 text-sm font-medium mb-2">Harga</label>
                  <input type="text" name="medicine_price" id="medicine_price" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="Harga obat" pattern="[0-9]+" title="Masukkan angka">
                  @error('medicine_price') <span class="error text-red-500">{{$message}}</span> @enderror
                </div>
                <hr>
                <br>


                <div class="mb-4">
                  <label for="medicine_expired_date" class="block text-gray-700 text-sm font-medium mb-2">Tanggal Kadaluarsa</label>
                  <input type="date" id="medicine_expired_date" name="medicine_expired_date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Tanggal kadaluarsa obat">
                  @error('medicine_expired_date') <span class="error text-red-500">{{$message}}</span> @enderror
                </div>
                <div class="mb-4">
                  <label for="medicine_stock" class="block text-gray-700 text-sm font-medium mb-2">Stok</label>
                  <input type="text" id="medicine_stock" name="medicine_stock" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Stok obat" 
                  title="Masukkan angka">
                  @error('medicine_stock') <span class="error text-red-500">{{$message}}</span> @enderror
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
