@extends('layouts.master')

@section('title','Daftar Transaksi')

@extends('layouts.navigation-bar')
@section('content')

<style>[x-cloak] { display: none !important; }</style>


<div class=" bg-gray-200 min-h-screen">
    <div class=" bg-gray-200 min-h-screen">
    <div class="flex justify-center pt-8">
      <div class="w-4/5 flex items-end space-x-4">
        <div class="w-14 h-14">
            <x-lineawesome-file-invoice-dollar-solid />


        </div>
        <h1 class=" font-bold text-2xl">Daftar Transaksi</h1>
      </div>
     
    </div>
    <div class="mt-4 flex items-center justify-center">
      <hr class="h-0.5 w-4/5 block bg-gray-500">
    </div>
   

    <div class="flex justify-center pt-4">
        <div class="w-4/5">
            
              <button onclick="Livewire.emit('openModal', 'tambah-transaksi')"  class="rounded-lg font-bold bg-green-500 hover:bg-white hover:text-green-500 hover:outline hover:outline-green-500 outline-2 transition-all px-5 py-2.5 mr-2 mb-2 text-center text-white "> + Buat Transaksi</button>
              

        </div>
    </div>

    <div class="flex justify-center pt-4 pb-4">

        <div class="w-4/5 h-fit">
            @livewire('transaction-table')
        </div>





    </div>


</div>





@stop
@section('footer')
  @include('layouts.footer')
@endsection
