@extends('layouts.master')

@section('title','Forgot Password')

@section('content')

<div class="bg-gray-200">
<div class="min-h-screen flex flex-col items-center justify-center">
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif

    <div class="w-full max-w-md">

      <div class="bg-white rounded-lg shadow-lg px-10 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Reset Password</h1>
        <form action="/forgot-password" method="POST">
            @csrf
          <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="email">
              Email
            </label>
            <input
              class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
              id="email" name="email" type="email" placeholder="Enter your email" required>
          </div>
          <div class="flex items-center justify-center">
            <button
              class="rounded-lg font-medium bg-green-500 hover:bg-white hover:text-green-500 hover:outline hover:outline-green-500 outline-2 transition-all  text-sm px-5 py-2.5 mr-2 mb-2 text-center text-white"
              type="submit">
              Reset Password
            </button>
          </div>
        </form>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="mt-4">
          <p class="text-center text-sm text-gray-600">
            Ingat kata sandi? <a class="text-blue-500 hover:text-blue-700" href="/login">Log in disini</a>.
          </p>
        </div>
      </div>
    </div>
  </div>
@stop
