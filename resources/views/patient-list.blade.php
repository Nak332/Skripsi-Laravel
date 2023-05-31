@extends('layouts.master')

@section('title','Resepsi')

@extends('layouts.navigation-bar')
@section('content')

<style>[x-cloak] { display: none !important; }</style>

<div class="flex h-full bg-white justify-center pt-12">
    <div class="w-3/5 h-fit">
        <livewire:patient-table />
    </div>
    
</div>




@stop