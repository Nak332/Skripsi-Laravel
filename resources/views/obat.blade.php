@extends('layouts.master')

@section('title','Detail Obat')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="flex-inline h-full pt-5 py-5 bg-gray-200">

    <div class="bg-white rounded-3xl shadow-md mx-auto w-3/4 p-8">
        <h1 class="text-2xl font-bold mb-4">Obat</h1>
        <table class="min-w-full bg-white">
            <tbody>
              <tr>
                <td class="px-4 py-2">Nama</td>
                <td class="px-4 py-2">output nama</td>
              </tr>
              <tr>
                <td class="px-4 py-2">Stok</td>
                <td class="px-4 py-2">
                  angka
                    <button class="ml-32 rounded-full bg-green-500 px-2 py-1 text-xl text-white transition duration-300 hover:bg-green-600">+</button>
                    <button class="rounded-full bg-red-500 ml-2 px-3 py-1 text-xl text-white transition duration-300 hover:bg-red-600">-</button>
                </td>
              </tr>
              <tr>
                <td class="px-4 py-2">Tanggal Kadaluarsa</td>
                <td class="px-4 py-2">tanggal</td>
              </tr>
              <tr>
                <td class="px-4 py-2">Deskripsi</td>
                <td class="px-4 py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat animi quaerat perferendis qui expedita! Dolorem minus excepturi optio ab sunt? Itaque quos voluptate suscipit explicabo temporibus deserunt incidunt voluptatum mollitia?</td>
              </tr>
              <tr>
                <td class="px-4 py-2">Harga</td>
                <td class="px-4 py-2">$$$</td>
              </tr>
            </tbody>
          </table>
      </div>
 
 

</div>


@stop
