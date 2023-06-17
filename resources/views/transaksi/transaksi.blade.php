@extends('layouts.master')

@section('title','Rekam medis')

@section('content')

@extends('layouts.navigation-bar')

    <div class="h-screen bg-gray-200">
        <div id="container_header_transaksi" class=" flex justify-center w-full pt-8">
            <div id="card_pasien" class="w-4/5 p-4 bg-white rounded">
                <h1 class="text-2xl font-bold mb-4 truncate">Transaksi 1</h1>
                <h1 class="text-sm  font-bold mb-4 truncate">No. Rekam Medis: 4</h1>
                <hr>
                <div class="flex justify-between mt-2">
                    <p class="w-1/2">Pasien: <br> John</p>
                    <p class="w-1/2">Dokter: <br> Elton </p>
                </div>
                <p class="mt-4">
                    Tanggal Transaksi: 24/04/2023 06:07:33
                </p>
                
            </div>
        </div>


        <div id="container_invoice" class=" flex justify-center w-full pt-8">
            <div id="card_pasien" class="w-4/5 p-4 bg-white rounded">
                <h1 class="text-2xl font-bold mb-4 truncate">Invoice</h1>
                <hr>

                <div class="w-full p-2 rounded mt-4 items-center">
                    <div class="mb-4 md:flex">
                        <label for="hasil_anamnesis" class="w-1/2 block text-gray-700 text-lg font-medium mb-2">Konsultasi</label>
                        <input type="number" name="" id="" placeholder="45000" class="w-1/2 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    <div class="mb-4 md:flex">
                        <label for="hasil_anamnesis" class="w-1/2 block text-gray-700 text-lg font-medium mb-2">Tindakan / Pelayanan</label>
                        <input type="number" name="" id=""  placeholder="45000" class="w-1/2 px-4 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-blue-300">
                    </div>

                  
                    <div>
                        <label for="hasil_anamnesis" class="w-1/2 block text-gray-700 text-lg font-medium mb-2 mt-4">Preskripsi Obat</label>
                        
                    </div>
                    <hr>
                    <div class="md:flex mt-4 mb-4 items-center">
                        <label for="Total" class="w-1/2 block text-gray-700 text-lg font-medium ">Total</label>
                        <p>500.500</p>
                    </div>
                    <hr>

                    <div class="md:flex mt-4 items-center">
                        <label for="Total" class="w-1/2 block text-gray-700 text-lg font-medium ">Tipe Pembayaran</label>
                    
                            <Select class="px-4 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-blue-300">
                                <option value="">Kredit</option>
                                <option value="">Debit</option>
                                <option value="">Kas</option>
                                <option value="">Lainnya</option>
                            </Select>
    
                    
                        
                    </div>
                    <div class="md:flex mt-4 items-center">
                        <label for="Total" class="w-1/2 block text-gray-700 text-lg font-medium ">Deskripsi Pembayaran</label>
                       
                         <input type="text" name="" id=""  class=" w-1/2 px-4 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-blue-300">
             
                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </div>

  
@stop