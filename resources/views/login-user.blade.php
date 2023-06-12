
@extends('layouts.master')

@section('title','Resepsi')

@section('content')

<div id="container-main-register" class="bg-gray-300">
    <section class=" bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen bg-gray-500 lg:py-0">
            
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-4xl text-white font-bold"> Klinik Sehat v1.0 </h1>
                    <hr >
                    <h1 class="  font-bold leading-tight tracking-tight mt-20 text-gray-900 md:text-2xl dark:text-white">
                        Selamat  Datang
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST" action="#">
                        @csrf
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>


                        <button type="submit" class="w-full text-white bg-green-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-800 hover:bg-white hover:text-green-500 transition-all">Login</button>
                            {{-- <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Forgot Password? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500"> Click here</a>
                            </p> --}}
                    </form>
                </div>
            </div>
        </div>
      </section>
