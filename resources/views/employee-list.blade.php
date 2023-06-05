@extends('layouts.master')

@section('title','Rekam medis')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="bg-gray-200">
  <div class="container mx-auto p-4">  
        <div class="min-h-screen flex items-center justify-center">
            <livewire:employee-table />
             
            </div>
          </div>
        

    



</div>



@stop