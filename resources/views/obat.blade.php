@extends('layouts.master')

@section('title','Detail Obat')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="flex-inline h-full pt-5 py-5 bg-gray-200">

    <div class="bg-white rounded-3xl shadow-md mx-auto w-3/4 p-8">
        <h1 class="text-2xl font-bold mb-4">Obat</h1>
        <table class="min-w-full bg-white">

              <tr>
                <td class="px-4 py-2">Nama</td>
                <td class="px-4 py-2">{{$medicine->medicine_name}}</td>
              </tr>

              <tr>
                <td class="px-4 py-2">Deskripsi</td>
                <td class="px-4 py-2">{{$medicine->medicine_description}}</td>
              </tr>
              <tr>
                <td class="px-4 py-2">Harga</td>
                <td class="px-4 py-2">{{$medicine->medicine_price}}</td>
              </tr>

          </table>
      </div>

      <div class="bg-white mt-12 h-max rounded-3xl shadow-md mx-auto w-3/4 p-8">
        <h1 class="text-2xl font-bold mb-4">Stok </h1>
        <table class="min-w-full bg-white">



            <tr>
              <td class="py-2 px-4 border border-black">Tanggal Kadaluarsa</td>
              <td class="py-2 px-4 border border-black ">Jumlah</td>
            </tr>

            @foreach ($medicineDetail as $MD)
            <tr>
              <td class="py-2 px-4 border border-black">{{$MD->medicine_expired_date}}</td>
              <td class="py-2 px-4 border border-black">{{$MD->medicine_stock}}</td>
              <td>
                <form action="/edit-stock/{{$MD->id}}" method="get">
                    <button class="rounded-full bg-black ml-2 px-3 py-1 text-lg text-white">
                        Edit
                      </button>
                </form>
              <form action="/delete-stock/{{$MD->id}}" method="post">
                @csrf
                <button class="rounded-full bg-red-500 ml-2 px-3 py-1 text-lg text-white transition duration-300 hover:bg-red-600">
                    Delete
                  </button>
              </form>
                </td>
            </tr>
            @endforeach

        </table>


    </div>

    <div class="flex justify-center pt-4" x-data="{ open: false }">
      <button @click="open = true" class="bg-gray-800 text-white font-bold py-2 px-4 rounded">
        Tambah
      </button>
        <div wire:model='medicinedetails' x-show="open">
            @livewire('tambah-stok-obat',['medicine'=>$medicine, 'medicineDetail'=>$medicineDetail])
        </div>
    </div>

</div>


@stop
