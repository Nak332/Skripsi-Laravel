@extends('layouts.master')

@section('title','Rekam medis')

@section('content')

@extends('layouts.navigation-bar')

<div class="h-screen bg-gray-200">

@livewire('transaction-detail-component', ['transaksi' => $transaksi, 'detil' => $detil])

</div>






@stop
