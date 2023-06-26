@extends('layouts.master')

@section('title','Daftar Obat')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="bg-gray-200">
  <div class=" bg-gray-200 min-h-screen">
    <div class="flex justify-center pt-8">
      <div class="w-4/5 flex items-center space-x-2">
        <div class="w-10 h-10">
          <x-ri-medicine-bottle-fill />
        </div>
        <h1 class=" font-bold text-2xl">Daftar Obat</h1>
      </div>
     
    </div>
    <div class="mt-4 flex items-center justify-center">
      <hr class="h-0.5 w-4/5 block bg-gray-500">
    </div>
    


     
    <div class="flex justify-center pt-4">
        <div class="w-4/5">
          <form action="/tambah-obat" method="get">
            <button class="rounded-lg font-bold bg-green-500 hover:bg-white hover:text-green-500 hover:outline hover:outline-green-500 outline-2 transition-all px-5 py-2.5 mr-2 mb-2 text-center text-white "> + Tambah Obat</button>
        </form>
  
        </div>
    </div>
  
    <div class="flex justify-center pt-4 pb-4">
  
        <div class="w-4/5 h-fit">
          @livewire('medicine-detail-table')
        </div>
  
  
  
  
  
    </div>
  
  
  </div>



</div>




@stop
@section('footer')
  @include('layouts.footer')
@endsection