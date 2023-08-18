

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Klinik Sehat - Surat Rujukan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('sweetalert::alert')
    <style>
        [x-cloak] { display: none !important; }
 
        
    </style>
    @livewireStyles
</head>

<body class="h-screen flex justify-center">
    @livewire('livewire-ui-modal')
    @livewireScripts


    <div class="w-full align-middle">
        <div class="">
            <div class="text-center">
                <h1 class="font-bold text-7xl">Dr. dr. Julitasari S., MSc-PH</h1>
                <h4 class="text-xs font-bold">SIP: 1/B.15b/31.73.08.1002.19.SPU-3/3/4M.09.74/e/2023</h3>
            </div>
            <div>
                <p class="text-center text-xs">
                    Taman Aries B2 No. 64<br>
                    Meruya Ilir, Kembangan<br>
                    Jakarta Barat<br>
                    Telp. : (021) 5859550, 22542156 Fax. :(021) 5856729<br>
                    <hr class="h-0.5 my-4 bg-black border-0 ">    
                </p>
                
            
            </div>

            <div class="text-center">
                <h1 class="font-bold text-7xl">SURAT RUJUKAN </h1>

                <p class="text-start my-2 text-xs">Yth. Bapak/Ibu/Pihak Dr. Test <br> Poli Ortopedi <br> <br> Mohon Pemeriksaan dan Pengobatan lebih lanjut untuk Pasien: <br> Nama : Nara <br> Umur: 8 Tahun<br> Alamat: Jakarta 56 <br></p>

                

                <p class="text-start my-2 text-xs">Dengan temuan: <br> <br> Anamnesis: Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur sed aliquid suscipit, veritatis rem facere. Saepe neque repellat, dolor perspiciatis omnis eius debitis nemo laboriosam iusto voluptate reiciendis, vel magnam? <br> <br> Kondisi saat ini: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero tenetur delectus deleniti at blanditiis dolores eligendi eius maiores! Quidem placeat assumenda hic quasi consequuntur modi maiores iste suscipit reiciendis enim! </p>
               <p class="text-start my-2 text-xs"> Atas penerimaannya saya berterima kasih. <br> <br> <br></p>

               <p class="text-end my-2 text-xs">Yang merujuk <br> <br> <br> <br> <br> <p class="text-end my-2 text-xs font-bold underline"> John Doe <br> </p> </p>
               <p class="text-end my-2 text-xs"> Dokter</p>
            </div>
        </div>
    </div>
        


    
    
    

</body>






</html>




