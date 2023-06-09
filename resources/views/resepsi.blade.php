@extends('layouts.master')

@section('title','Resepsi')

@extends('layouts.navigation-bar')

@section('content')




{{-- TESST --}}
{{-- @foreach ($antrian as $a)
  <p>{{ $antrian }}</p>
@endforeach --}}

<div>

</div>

@livewire('resepsi-main-component',['history' => $history,'antrian'=>$antrian])





@stop


