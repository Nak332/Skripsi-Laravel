@extends('layouts.master')

@section('title','Change Password')

@section('content')

@extends('layouts.navigation-bar')

<div class="bg-gray-200">
<div class="min-h-screen flex flex-col items-center justify-center">
    <div class="w-full max-w-md">

      <div class="bg-white rounded-lg shadow-lg px-10 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Change Password</h1>
        <form action="/reset-password" method="POST">
          @csrf
        
          <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="email">
              Old Password
            </label>
            <input
              class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
              id="password_old" name="password_old" type="password_old" placeholder="" required>
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="email">
              New Password
            </label>
            <input
              class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
              id="password_new" name="password_new" type="password" placeholder="" required>
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="email">
              Confirm Password
            </label>
            <input
              class="appearance-none border border-gray-300 rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline"
              id="password_new_confirm" name="password_new_confirm" type="password" placeholder="" required>
          </div>
   
          <div class="flex items-center justify-center">
            <button
              class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              type="submit">
              Enter
            </button>
          </div>
        </form>
      
      </div>
    </div>
  </div>
@stop
