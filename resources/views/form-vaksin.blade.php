@extends('layouts.master')

@section('title','Tambah Vaksin')

@extends('layouts.navigation-bar')

@section('content')



<div id="container-main" class="bg-gray-200">

  @livewire('form-vaksin-component')


@stop
@section('footer')
  @include('layouts.footer')
@endsection

