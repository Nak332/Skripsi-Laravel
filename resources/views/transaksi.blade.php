@extends('layouts.master')

@section('title','Rekam medis')

@section('content')

@extends('layouts.navigation-bar')

    <div class="h-screen bg-gray-200">
        <div id="container_header_transaksi" class=" flex justify-center w-full pt-8">
            <div id="card_pasien" class="w-4/5 p-4 bg-white rounded">
                <h1 class="text-2xl font-bold mb-4 truncate">Transaksi TR-01</h1>
                <hr>
                <div class="flex justify-between mt-2">
                    <p>Pasien: John</p>
                    <p>Dokter: Elton </p>
                </div>
                Tanggal Transaksi: 24/04/2023 06:07:33
            </div>
        </div>
        {{-- <div id="container_pasien" class=" flex justify-center w-full pt-8">
            <div id="card_pasien" class="w-4/5 p-4 bg-white rounded">
                <h1 class="text-2xl font-bold mb-4 truncate">Data Pasien</h1>
                <hr>
                
            </div>
        </div> --}}

        <div id="container_invoice" class=" flex justify-center w-full pt-8">
            <div id="card_pasien" class="w-4/5 p-4 bg-white rounded">
                <h1 class="text-2xl font-bold mb-4 truncate">Invoice</h1>
                <hr>
                
            </div>
        </div>

    </div>
@stop