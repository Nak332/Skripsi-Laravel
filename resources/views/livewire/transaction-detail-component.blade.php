<div class="bg-gray-200 h-fit">
    <div id="container_header_transaksi" class=" flex justify-center w-full pt-8">
        <div id="card_pasien" class="w-4/5 p-4 bg-white rounded ">
            <h1 class="text-2xl font-bold mb-4 truncate">Transaksi {{$transaksi->id}}</h1>
            @if ($transaksi->rekamMedis_id)
            <h1 class="text-sm  font-bold mb-4 truncate">No. Rekam Medis: {{$transaksi->rekamMedis_id}}</h1>
            @elseif (!$transaksi->rekamMedis_id && !$transaksi->patient_id)
            <h1 class="text-sm  font-bold mb-4 truncate">Pembelian Obat</h1>
            @else
            <h1 class="text-sm  font-bold mb-4 truncate">Lain-Lain</h1>
            @endif

            <hr>
            <div class="flex justify-between mt-2">
                @if ($transaksi->patient)
                <div class="w-1/2">
                    <p class="font-bold">Pasien:</p>
                    <p class=""> {{$transaksi->patient->patient_name}} <br> Nomor Pasien {{$transaksi->patient->id}} </p>
                </div>
                @else

                @endif
                @if ($transaksi->rekammedis)
                <div class="w-1/2">
                    <p class="font-bold">Dokter:  </p>
                    <p class="">{{$transaksi->rekammedis->employees->employee_name}} </p>
                    <p class="">Nomor Karyawan {{$transaksi->rekammedis->employees->id}} </p>
                </div>

                @elseif ($transaksi->employee)

                <div class="w-1/2">
                    <p class="font-bold">Kasir:  </p>
                    <p class="">{{$transaksi->employee->employee_name}} </p>
                    <p class="">Nomor Karyawan {{$transaksi->employee->id}} </p>
                </div>
                @else
                <div class="w-1/2">
                    <p class="font-bold">Kasir:  </p>
                    <p class="">{{Auth::user()->Employee->employee_name}}</p>
                    <p class="">Nomor Karyawan {{Auth::user()->Employee->id}}</p>
                </div>
                @endif

            </div>
            <p class="mt-4">
                Tanggal Transaksi: {{$transaksi->created_at}}
            </p>

        </div>
    </div>



        <div id="container_invoice" class=" flex justify-center w-full ">
            <div id="card_pasien" class="w-4/5 ">
                @if ($transaksi->patient_id)
                <div class=" bg-white p-4 rounded my-6">
                    <label for="hasil_anamnesis" class="w-1/2 block text-black text-lg font-medium mb-2 ">Layanan</label>
                    <hr>
                    <div class="w-full p-2 rounded mt-4 items-center">
                    @foreach ($detil as $item)
                    @if ($item->konsultasi != NULL)
                    <div class="mb-4 md:flex">
                        <label  class="w-1/2 block text-black text-lg font-medium p-2">Konsultasi</label>
                        <input type="number" wire:init='SetKonsul({{$item->id}})' wire:model="konsul" wire:change="UpdateKonsul({{$item->id}})" placeholder="{{$item->price}}" class="w-1/2 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    @endif
                    @endforeach
                    </div>

                    <div class="w-full p-2 rounded mt-4 items-center">
                    @foreach ($detil as $item)
                    @if ($item->treatment != NULL)
                    <div class="mb-4 md:flex">
                        <label  class="w-1/2 block text-black text-lg font-medium p-2">{{$item->treatment}}</label>
                        <input type="number" wire:init='SetTreatment({{$item->id}})' wire:model="treatment" wire:change="UpdateTreatment({{$item->id}})"   placeholder="45000" class="w-1/2 px-4 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    @endif
                    @endforeach
                    </div>
                </div>

                @endif

                @if ($transaksi->rekamMedis_id or !$transaksi->patient_id)

                <div class="bg-white p-4 rounded my-6">

                    <div class=""></div>
                    <div>
                        <label for="hasil_anamnesis" class="w-1/2 block text-black text-lg font-medium mb-2 ">Preskripsi Obat</label>
                    </div>
                    <hr>
                    <table class="w-max my-4">
                        <thead class="">
                            @if ($detil->isEmpty() && !$transaksi->rekammedis->medicine_id)
                            <p class="mt-3">Daftar Obat Kosong</p>
                            @else
                            <tr class="">
                                <th class="text-black text-base text-start font-medium capitalize">Nama Obat</th>
                                <th class="text-black text-base text-start font-medium capitalize">Kuantitas</th>
                                <th class="text-black text-base text-start font-medium capitalize">Tipe</th>
                                <th class="text-black text-base text-start font-medium capitalize">Dosis</th>
                                <th class="text-black text-base text-start font-medium capitalize">Harga</th>
                                <th class="text-black text-base text-start font-medium capitalize">Harga Total</th>
                            </tr>
                            @endif

                        </thead>
                        <tbody>
                            @foreach ($detil as $index => $item)
                                @if ($item->medicine_id != null)

                                    <tr>
                                        <td class="align-top">
                                            <div class="w-64 max-w-full  ">
                                                <p class="py-4">{{ $item->medicine->medicine_name }} @php

                                                    $sum = \App\Models\Medicine::stock($item->medicine->id);
                                                @endphp
                                                (Stok: {{$sum}})
                                            </p>
                                            </div>
                                         </td>

                                         <td class="align-top">
                                            <input type="number" wire:model="detil.{{ $index }}.quantity" disabled wire:change="UpdateQuantity({{ $item->id }},{{ $detil[$index]->quantity }})" class="px-4 w-24 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                                        </td>

                                        {{-- <td class="align-top">
                                            <input type="number" wire:model="detil.{{ $index }}.quantity" disabled wire:change="UpdateQuantity({{ $item->id }},{{ $detil[$index]->quantity }})" class="px-4 w-24 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                                        </td> --}}
                                        <td class="align-top">
                                            <input type="text" disabled wire:model="detil.{{ $index }}.konsumsi" wire:change="UpdateKonsumsi({{ $item->id }},{{ $detil[$index]->konsumsi }})" class="px-4 w-32 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                                        </td>
                                        {{-- <td class="align-top">
                                            <select wire:model="detil.{{ $index }}.konsumsi" wire:change="UpdateKonsumsi({{ $item->id }},{{ $detil[$index]->konsumsi }})" name="consumption_type" disabled id="" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" name="" id="">
                                                <option value="">Kapsul</option>
                                                <option value="">Tablet</option>
                                                <option value="">Sirup</option>
                                                <option value="">Salep</option>
                                            </select>
                                        </td> --}}
                                        <td class="align-top">
                                            <input type="text" disabled wire:model="detil.{{ $index }}.dosis" wire:change="UpdateDosis({{ $item->id }},{{ $detil[$index]->dosis }})" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                                        </td>


                                        <td class="align-top">
                                            <input type="number" wire:model="detil.{{ $index }}.price" wire:change="UpdateMedicinePrice({{ $item->id }},{{ $detil[$index]->price }})" class="px-4 w-32 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" name="" id="">
                                        </td>
                                        <td class="align-top">
                                            <p class="px-4 w-32 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" disabled>  {{$detil[$index]->quantity * $detil[$index]->price}} </p>

                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>


                    @if ($transaksi->flag ==1)
                    <div x-data="{ showDiv: false }">
                        <label class="bg-yellow-300 p-2 text-black rounded">
                            <input type="checkbox" x-model="showDiv" class="form-checkbox">
                            <span class="ml-2">Edit Obat</span>
                        </label>
                        <div x-show="showDiv" x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-300"
                             class="mt-4 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300">
                            @if ($rekammedis)
                                @livewire('medicine-cart',['transact_rekam' => $rekammedis])
                            @elseif(!$transaksi->patient_id)
                                @livewire('medicine-cart',['medicine_purchase' => $transaksi->id])
                            @else
                                @livewire('medicine-cart')
                            @endif
                        </div>
                    </div>
                    @endif


                </div>

                @if ($transaksi->rekamMedis_id)
                <div class=" bg-white p-4 rounded my-6">

                    <div class="">
                        <label for="hasil_anamnesis" class="w-1/2 block text-black text-lg font-medium mb-2 ">Obat Lain</label>
                    </div>
                    <hr>
                    @if ($transaksi->rekammedis->extra_medicine)
                    <table class="w-full my-4">
                        <thead class="">
                            <tr >
                                <th class="text-black text-base text-start font-medium capitalize">Deskripsi Obat</th>
                                <th class="text-black text-base text-start font-medium capitalize">Harga Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detil as $index => $item)
                                @if ($item->extra_medicine != null)
                                    <tr>
                                        <td class="align-top">
                                            {{-- <div class=" w-64 max-w-sm">
                                                {{ $item->medicine->medicine_name }}
                                            </div>
                                             --}}
                                             {{-- <input type="text" wire:model="detil.{{$index}}.extra_medicine" wire:change="UpdateExtra({{$item->id}},{{$detil[$index]->extra_medicine}})" rows="5" class=" px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300 w-64 max-w-sm" value="{{$item->extra_medicine}}"> --}}
                                             <textarea wire:init='SetExtra({{$item->id}})' wire:model="extra_medicine" wire:change="UpdateExtra({{$item->id}})" rows="5" class=" px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300 w-64 max-w-sm" value="{{$item->extra_medicine}}">{{$item->extra_medicine}}</textarea>
                                        </td>
                                        <td class="align-top">
                                            <input type="number" wire:model="detil.{{ $index }}.price" wire:change="UpdateMedicinePrice({{ $item->id }},{{ $detil[$index]->price }})" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p class="mt-3">Tidak ada</p>
                    @endif


                </div>

                @endif




                @endif




                <form action="/update-transaksi/{{$transaksi->id}}" method="post">
                    @csrf
                    <input type="text" name="employee_id" id="employee_id" class='hidden' value="{{Auth::user()->employee_id}}">

                    <div class="flex items-center justify-between">

                      </div>

                      <div class=" bg-white p-4 rounded my-6">
                      <div class="md:flex mt-4 items-center">
                        <label for="Total" class="w-1/2 block text-black text-lg font-medium ">Tipe Pembayaran</label>
                        @if ($transaksi->flag ==1)
                            <Select name="payment" id="payment" class="px-4 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-blue-300">
                                <option value="Kredit">Kredit</option>
                                <option value="Debit">Debit</option>
                                <option value="Tunai">Tunai</option>
                                {{-- <option value="">Lainnya</option> --}}
                            </Select>
                        @else
                            <p class="px-4 py-2">{{$transaksi->payment}}</p>
                        @endif

                    </div>

                        <div class="md:flex mt-4 mb-4 items-center">
                            <label for="Total" class="w-1/2 block text-black text-lg font-medium ">Total</label>
                            <p class="font-bold text-lg p-2"  name="Total" wire:init='SetTotal({{$transaksi->id}})'>{{number_format($totalharga,2,'.')}} Rupiah</p>
                            <input type="text" name="total" value="{{$totalharga}}" class="hidden">
                        </div>
                        @if ($transaksi->flag == 1)
                        <button
                        class="rounded-lg font-medium bg-green-500 hover:bg-white hover:text-green-500 hover:outline hover:outline-green-500 outline-2 transition-all px-4 py-2.5 mr-2 mb-2 text-center text-white"
                        type="submit">
                        Submit
                        </button>
                        @endif

                </form>

                @if ($transaksi->flag == 1 && !$transaksi->rekamMedis_id)
                <form action="/batalkan-transaksi/{{$transaksi->id}}" method="post">
                    @csrf
                    <button type="" class="rounded-lg font-medium bg-red-500 hover:bg-white hover:text-red-500 hover:outline hover:outline-red-500 outline-2 transition-all px-4 py-2.5 mr-2 mb-2 text-center text-white">Batalkan Transaksi</button>
                </form>
                @endif
                    </div>
                    </div>


                </div>

            </div>


    </div>
</div>
