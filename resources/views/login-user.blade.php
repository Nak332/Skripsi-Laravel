
@extends('layouts.master')

@section('title','Login')

@section('content')

<div id="container-main-register" class="bg-gray-200">

        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 h-screen">

            <div class="w-full bg-white rounded-lg shadow-md dark:border md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-4xl font-bold"> Klinik Sehat v1.0 </h1>
                    <hr >
                    <h1 class="  font-bold leading-tight tracking-tight mt-20 text-gray-900 md:text-2xl ">
                        Selamat  Datang
                    </h1>
                    @if (session('error'))
                    <div class="alert alert-danger">
                         {{ session('error') }}
                    </div>
                 @endif
                    <form class="space-y-4 md:space-y-6" method="POST" action="#">
                        @csrf
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                            <input type="password" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>


                        <button type="submit" class="w-full rounded-lg font-medium bg-green-500 hover:bg-white hover:text-green-500 hover:outline hover:outline-green-500 outline-2 transition-all  text-sm px-5 py-2.5 mr-2 mb-2 text-center text-white">Login</button>
                        <div class="mt-4">
                            <p class="text-center text-sm ">
                              Lupa password? <a class="text-blue-500 hover:text-blue-700" href="/forgot-password">Klik Disini</a>.
                            </p>
                          </div>
                    </form>
                </div>
            </div>
        </div>

