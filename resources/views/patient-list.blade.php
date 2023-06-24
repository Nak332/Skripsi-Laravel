@extends('layouts.master')

@section('title','Daftar Pasien')

@extends('layouts.navigation-bar')
@section('content')

<style>[x-cloak] { display: none !important; }</style>


<div class=" bg-gray-200 min-h-screen">
    <div class="flex justify-center pt-8">
        <h1 class="w-4/5 font-bold text-2xl">Daftar Pasien</h1>
    </div>

    <div class="flex justify-center pt-12">
        <div class="w-4/5">
            <form action="/tambah-pasien" method="get">
                <button class="rounded-lg font-bold bg-green-500 hover:bg-white hover:text-green-500 hover:outline hover:outline-green-500 outline-2 transition-all px-5 py-3 mr-2 mb-2 text-center text-white "> + Tambah Pasien</button>
            </form>

        </div>
    </div>

    <div class="flex justify-center pt-12 pb-4">

        <div class="w-4/5 h-fit">
            @livewire('patient-table2')
        </div>





    </div>


</div>





@stop
@section('footer')
  @include('layouts.footer')
@endsection
