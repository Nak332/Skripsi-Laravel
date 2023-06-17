@extends('layouts.master')

@section('title','Forgot Password')

@section('content')

@extends('layouts.navigation-bar')

<div class="bg-gray-200">
<div class="min-h-screen flex flex-col items-center justify-center">
    <div class="w-full max-w-md">

      <div class="bg-white rounded-lg shadow-lg px-10 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Reset Password</h1>
        <form>
          <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="email">
              Email
            </label>
            <input
              class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
              id="email" type="email" placeholder="Enter your email" required>
          </div>
          <div class="flex items-center justify-between">
            <button
              class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              type="submit">
              Reset Password
            </button>
          </div>
        </form>
        <div class="mt-4">
          <p class="text-center text-sm text-gray-600">
            Ingat kata sandi? <a class="text-blue-500 hover:text-blue-700" href="/login">Log in disini</a>.
          </p>
        </div>
      </div>
    </div>
  </div>
@stop
