<div class="h-screen">
   
    <div id="sambutan" class="w-full  flex p-6">
        <p class="text-center text-2xl w-5/12 font-bold ">
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
                <h1 class="font-bold">Transaksi Hari Ini</h1> 
                {{-- <hr class="h-0.5 rounded-2xl my-4 border-0 dark:bg-gray-700"> --}}
                <div class="justify-center flex mt-4">
                    <div class="w-full h-72 inline bg-white  rounded overflow-y-auto">
                    @if ($transaction_list)
                        @foreach ($transaction_list as $t)
                            <form class="bg-blue-400 text-white m-3 p-2 rounded " action="/transaksi/{{$t->id}}" method="GET">
                                <button class="w-full text-start justify-between flex font-bold" >
                                    <div class="">
                                       Transaksi No. {{$t->id}} ({{$t->flag == 1 ? "Terbuka" : "Selesai"}})
                                    </div>
                                    <div class=""> 
                                        {{DATE_FORMAT($t->created_at,'H:i:s')}}
                                    </div>
                                </button>
                                
                            </form>

                        @endforeach
                        
                    @endif
                        
                            
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
                <div class="flex justify-between items-center">
                    <h1 class="font-bold">Jadwal Vaksinasi </h1>  
                    <form action="/tambah-vaksin">
                        <button class="bg-green-500 text-white p-2  rounded font-bold"> 
                            + Riwayat Vaksin
                        </button>
                    </form>
                </div>

                <div class=" flex mt-4 justify-center">
                    <div class="w-full h-64 inline bg-white  rounded overflow-y-auto">
                        
                        @foreach ($vaksin_list as $v)
                            <form class="bg-blue-400 text-white m-3 p-2 rounded " action="/pasien/{{$v->patient_id}}" method="GET">
                                <button class="w-full text-start justify-between flex font-bold" >
                                    <div class="">
                                        {{$v->patient->patient_name}} 
                                    </div>
                                    <div class=""> 
                                        {{$v->next_dose}}
                                    </div>
                                </button>
                                
                            </form>

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
