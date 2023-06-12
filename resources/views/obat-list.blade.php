@extends('layouts.master')

@section('title','Daftar Karyawan')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="bg-gray-200">
  <div class="container mx-auto p-4 flex justify-center w-full">  
    
        <div class="min-h-screen  w-full items-center justify-center">
            <livewire:medicine-detail-table />
             
            </div>
            {{-- <div class="flex justify-center pt-4">
              <button class="bg-gray-800 text-white font-bold py-2 px-4 rounded">
                Edit
              </button>
            </div> --}}
          </div>
          

    



</div>



@stop