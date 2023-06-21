<div class="h-screen">
   
    <div id="sambutan" class="w-full  flex p-6">
        <p class="text-center w-5/12 font-bold ">
            Selamat Datang, {{Auth::user()->employee->employee_name}}
        </p>
        <hr>
    </div>

    

    

    <div id="top_container" class="justify-center md:flex w-full">
        <div class="bg-gray-300 rounded-xl w-1/3 h-96 p-4 m-4 flex flex-col justify-center items-center text-center">
            <div class="h-full flex flex-col justify-center items-center">
                <h1 class="md:text-9xl">{{$patient_stats}}</h1>
                <h1 class="text-xl">Jumlah Pasien Terdaftar</h1>
            </div>
        </div>
        <div class="bg-gray-300 rounded-xl w-1/3 h-96 p-4 m-4">
            <div> 
                <h1 class="font-bold ml-7">Rekam</h1> 
                {{-- <hr class="h-0.5 rounded-2xl my-4 border-0 dark:bg-gray-700"> --}}
                <div class="justify-center flex mt-4">
                    <div class="w-11/12 h-72 bg-white inline rounded overflow-y-auto">
               

                    </div>

                </div>
                

                
            </div>
        </div>
    </div>

    <div id="top_container" class="content-center justify-center md:flex w-full">
        <div class="bg-gray-300 rounded-xl w-1/3 h-96 p-4 m-4 flex flex-col justify-center items-center text-center">
            <div class="h-full flex flex-col justify-center items-center">  
                <h1 class="text-9xl">{{$antrian_stats}}</h1>
                <h1 class="text-xl">Dalam antrian</h1>
            </div>
        </div>

        <div class="bg-gray-300 rounded-xl w-1/3 h-96 p-4 m-4">
            <div> 
                <div class="flex justify-between items-center mx-7">
                    <h1 class="font-bold">Jadwal Vaksinasi </h1>  
                    <button class="bg-green-500 text-white p-2  rounded font-bold"> 
                        + Riwayat Vaksin
                    </button>

                </div>

                <div class="justify-center flex mt-4">
                    <div class="w-11/12 h-72 bg-white inline rounded overflow-y-auto">
                        <div class="bg-blue-400 w-4/5 m-3 p-2 rounded">Satria Narayana</div>
                        @foreach ($vaksin_list as $v)
                            {{$v}}<div class="bg-blue-400 w-4/5 m-3 p-2 rounded">Satria Narayana</div>
                            <div class="bg-blue-400 w-4/5 m-3 p-2 rounded">Satria Narayana</div>
                            <div class="bg-blue-400 w-4/5 m-3 p-2 rounded">Satria Narayana</div>
                        @endforeach
                    </div>
                </div>
                

                
            </div>
        </div>
    </div>
    {{-- <div class="flex justify-center py-4">
        <button class="bg-green-500 text-white p-4 text-xl rounded font-bold"> 
            Tambah rekam
        </button>
    </div> --}}

</div>
