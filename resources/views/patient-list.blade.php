@extends('layouts.master')

@section('title','Daftar Pasien')

@extends('layouts.navigation-bar')
@section('content')

<style>[x-cloak] { display: none !important; }</style>

<div class="flex min-h-screen bg-white justify-center pt-12 pb-4">
    <div class="w-4/5 h-fit">
        <livewire:patient-table />
    </div>
    
</div>




@stop