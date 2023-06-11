@extends('layouts.master')

@section('title','Rekam medis')

@section('content')

@extends('layouts.navigation-bar')



<div id="container-main h-fit" class="bg-gray-200">

 
    @livewire('tambah-rekam', ['selected_patient' => $rekamMedis])




</div>



@stop
