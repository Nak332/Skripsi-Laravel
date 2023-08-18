

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css" media="print">
        @page
        {
            size:  auto;   /* auto is the initial value */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }

        html
        {
            background-color: #FFFFFF;
            margin: 0px;  /* this affects the margin on the html before sending to printer */
        }

        body
        {
            border: solid 1px blue ;
            margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
        }
        </style>
    <title>Klinik Sehat - Surat Rujukan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('sweetalert::alert')
    <style>
        [x-cloak] { display: none !important; }


    </style>
    @livewireStyles
</head>

<body class="h-screen flex justify-center p-6">
    @livewire('livewire-ui-modal')
    @livewireScripts


    <div class="w-full align-middle">
        <div class="">
            <div class="text-center">
                <h1 class="font-bold text-2xl">Dr. dr. Julitasari S., MSc-PH</h1>
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
                <h1 class="font-bold text-xl mb-12">SURAT RUJUKAN </h1>

                <p class="text-start my-2 text-xs">Yth. Bapak/Ibu/Pihak {{$surat->rujukan_recipient}} <br> {{$surat->rujukan_specialist}} <br> <br> Mohon Pemeriksaan dan Pengobatan lebih lanjut untuk Pasien: <br> Nama : {{$pasien->patient_name}} <br> Umur: {{$pasien->getAge()}}<br> Alamat: {{$pasien->patient_address}} <br></p>



                <p class="text-start my-2 text-xs">Dengan temuan: <br> <br> Anamnesis: {{$surat->anamnesis}} <br> <br> Kondisi saat ini: {{$surat->rujukan_current_state}} </p>
               <p class="text-start my-2 text-xs"> Atas penerimaannya saya berterima kasih. <br> <br> <br></p>

               <p class="text-end my-2 text-xs">Yang merujuk <br> <br> <br> <br> <br> <p class="text-end my-2 text-xs font-bold underline"> {{$surat->Employees->employee_name}} <br> </p> </p>
               <p class="text-end my-2 text-xs"> Dokter</p>
            </div>
        </div>
    </div>







</body>






</html>




