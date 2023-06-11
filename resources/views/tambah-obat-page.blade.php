@extends('layouts.master')

@section('title','Tambah Obat')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="bg-gray-200">
    @livewire('tambah-obat')
</div>

@stop