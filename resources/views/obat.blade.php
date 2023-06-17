@extends('layouts.master')

@section('title','Detail Obat')

@section('content')

@extends('layouts.navigation-bar')

<div id="container-main" class="flex-inline h-screen pt-5 py-5 bg-gray-200">

    <div class="bg-white rounded-3xl shadow-md mx-auto w-3/4 p-8">
        <h1 class="text-2xl font-bold mb-4 px-2">Obat</h1>
          <table class="min-w-full bg-white">
              <tr>
                <td class="px-2 py-2 font-bold">Nama</td>
                <td class="px-2 py-2">{{$medicine->medicine_name}}</td>
              </tr>

              <tr>
                <td class="px-2 py-2 font-bold">Deskripsi</td>
                <td class="px-2 py-2">{{$medicine->medicine_description}}</td>
              </tr>
              <tr>
                <td class="px-2 py-2 font-bold">Harga</td>
                <td class="px-2 py-2">{{$medicine->medicine_price}}</td>
              </tr>

          </table>
          <div class="px-2 flex mt-4 justify-start">
            <a href="edit_obat/{{$medicine->id}}">
            <button type="submit" class="bg-gray-700 hover:bg-white hover:text-gray-700 hover:outline hover:outline-gray-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 outline-2 transition-all text-center text-white ">Edit</button>
            </a>
            <div x-data="{ open: false }">
              <button @click="open = true" class="rounded-lg font-medium bg-red-500 hover:bg-white hover:text-red-500 hover:outline hover:outline-red-500 outline-2 transition-all  text-sm px-5 py-2.5 mr-2 mb-2 text-center text-white"> Delete </button>
              <div x-show="open">
                @livewire('delete-obat',['medicine'=>$medicine])
              </div>
          </div>
        </div>

      </div>

      <div class="bg-white mt-12 h-max rounded-3xl shadow-md mx-auto w-3/4 p-8">
        <h1 class="text-2xl font-bold mb-4">Stok </h1>
        


          @if ($medicineDetail->first())
          <div class=" min-w-full ">
              <div class="flex p-2 bg-gray-300 rounded">
                  <p class="w-5/12 text-center font-bold">Tanggal kadarluasa</p>
                  <p class="w-5/12 text-center font-bold"> Jumlah</p>
                  <p class="w-2/12 text-center font-bold"> Operasi</p>
              </div>
             
              @foreach ($medicineDetail as $MD)
              <div class="flex p-2">
                <p class="w-5/12 text-center {{$MD->isExpired() ? 'text-red-500': '' }}">{{$MD->medicine_expired_date}}</p>
                <p class="w-5/12 text-center">{{$MD->medicine_stock}} pcs</p>
                
               
                <div class="flex w-2/12 justify-center content-center ">
                  <div x-data="{ open: false }">
                    <button @click="open = true" class="rounded-full bg-yellow-400 hover:bg-white hover:text-yellow-400 hover:outline hover:outline-yellow-400 outline-2 transition-all  ml-2 px-3 py-1 text-center text-white"> <x-far-edit class=" w-6 h-6" /> </button>
                    <div wire:model='medicinedetails' x-show="open">
                      @livewire('edit-stok-obat',['medicine'=>$medicine,'medicineDetail'=>$MD])
                    </div>
                  </div>
    
                    {{-- </form> --}}
                  <form action="/delete-stock/{{$MD->id}}" method="post">
                    @csrf
                    <button class="rounded-full  bg-red-500 hover:bg-white hover:text-red-500 hover:outline hover:outline-red-500 outline-2 transition-all ml-2 px-3 py-1 text-lg text-white  duration-300 ">
                      <x-feathericon-x  class=" w-6 h-6"/>
                      </button>
                  </form>

                </div>
              
              </div>
              <hr>
              @endforeach
          </div>
         {{-- <table class="min-w-full bg-white rounded-lg mb-2">
          
            <tr>
              <td class="py-2 px-4 border border-black ">Tanggal Kadaluarsa</td>
              <td class="py-2 px-4 border border-black ">Jumlah</td>
            </tr>

            @foreach ($medicineDetail as $MD)
            <tr>
              <td class="py-1 px-1 border border-black">{{$MD->medicine_expired_date}}</td>
              <td class="py-1 px-1 border border-black">{{$MD->medicine_stock}}</td>
              <td>
            <div class="pt-2 flex">
              <div x-data="{ open: false }">
                <form action="/edit-stock/{{$MD->id}}" method="get">
                    <button @click="open = true" class="rounded-full bg-black ml-2 px-3 py-1 text-lg text-white"> 
                        Edit
                       </button>
                <div wire:model='medicinedetails' x-show="open">
                  @livewire('edit-stok-obat',['medicine'=>$medicine,'medicineDetail'=>$MD])
                </div>
              </div>

                </form>
              <form action="/delete-stock/{{$MD->id}}" method="post">
                @csrf
                <button class="rounded-full bg-red-500 ml-2 px-3 py-1 text-lg text-white transition duration-300 hover:bg-red-600">
                    Delete
                  </button>
              </form>
                </td>
            </div>
            </div>


            </tr>
            @endforeach

        </table> --}}
        @else
        <p class="pb-2">Stok masih kosong</p>
        @endif
        <hr class="">
        <div class="flex justify-start pt-2" x-data="{ open: false }">
          <button @click="open = true" class="bg-green-500 hover:bg-white hover:text-green-500 hover:outline hover:outline-green-500 outline-1 text-white items-center flex font-bold py-2 px-2 rounded transition-all">
            <x-ri-add-fill class="h-4 w-4"/> 
            <p class="pl-2">Tambah Stok</p>
          </button>
            <div wire:model='medicinedetails' x-show="open">
                @livewire('tambah-stok-obat',['medicine'=>$medicine, 'medicineDetail'=>$medicineDetail])
            </div>
        </div>

    </div>

   

</div>


@stop
