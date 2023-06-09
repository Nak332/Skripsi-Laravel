@extends('layouts.master')

@section('title','Daftar Pasien')

@extends('layouts.navigation-bar')
@section('content')

<style>[x-cloak] { display: none !important; }</style>


<div class=" bg-gray-200 min-h-screen">

    <div class="flex justify-center pt-12">
        <div class="w-4/5">
            <button class="bg-green-500 text-white font-bold rounded-lg p-4 "> + Tambah Pasien</button>
        </div>
    </div>
    
    <div class="flex justify-center pt-12 pb-4">
   
        <div class="w-4/5 h-fit">
            @livewire('patient-table2')
        </div>
        
    
    
         
        
    </div>
    

</div>





@stop