<div>
    <div id="container_header_transaksi" class=" flex justify-center w-full pt-8">
        <div id="card_pasien" class="w-4/5 p-4 bg-white rounded">
            <h1 class="text-2xl font-bold mb-4 truncate">Transaksi {{$transaksi->id}}</h1>
            <h1 class="text-sm  font-bold mb-4 truncate">No. Rekam Medis: {{$transaksi->rekamMedis_id}}</h1>
            <hr>
            <div class="flex justify-between mt-2">
                <p class="w-1/2">Pasien: <br> {{$transaksi->patient->patient_name}}</p>
                <p class="w-1/2">Dokter: <br> Elton </p>
            </div>
            <p class="mt-4">
                Tanggal Transaksi: {{$transaksi->created_at}}
            </p>

        </div>
    </div>

    <form action="" method="post">

        <div id="container_invoice" class=" flex justify-center w-full pt-8">
            <div id="card_pasien" class="w-4/5 p-4 bg-white rounded">
                <h1 class="text-2xl font-bold mb-4 truncate">Invoice</h1>
                <hr>

                <div class="w-full p-2 rounded mt-4 items-center">
                    @foreach ($detil as $item)
                    @if ($item->konsultasi != NULL)
                    <div class="mb-4 md:flex">
                        <label for="hasil_anamnesis" class="w-1/2 block text-gray-700 text-lg font-medium mb-2">Konsultasi</label>
                        <input type="number" wire:init='SetKonsul({{$item->id}})' wire:model="konsul" wire:change="UpdateKonsul({{$item->id}})" placeholder="{{$item->price}}" class="w-1/2 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    @endif
                    @endforeach

                    {{-- <div class="mb-4 md:flex">
                        <label for="hasil_anamnesis" class="w-1/2 block text-gray-700 text-lg font-medium mb-2">Tindakan / Pelayanan</label>

                        <input type="number" name="" id=""  placeholder="45000" class="w-1/2 px-4 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-blue-300">
                    </div> --}}
                    @foreach ($detil as $item)
                    @if ($item->treatment != NULL)
                    <div class="mb-4 md:flex">
                        <label for="hasil_anamnesis" class="w-1/2 block text-gray-700 text-lg font-medium mb-2">{{$item->treatment}}</label>
                        <input type="number" wire:init='SetTreatment({{$item->id}})' wire:model="treatment" wire:change="UpdateTreatment({{$item->id}})"   placeholder="45000" class="w-1/2 px-4 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-blue-300">
                    </div>
                    @endif
                    @endforeach

                    <div>
                        <label for="hasil_anamnesis" class="w-1/2 block text-gray-700 text-lg font-medium mb-2 mt-4">Preskripsi Obat</label>
                    </div>
                    @foreach ($detil as $index => $item)
                    @if ($item->medicine_id != NULL)
                    {{$item->medicine->medicine_name}}
                    <input type="number" wire:model="detil.{{$index}}.quantity" wire:change="UpdateQuantity({{$item->id}},{{$detil[$index]->quantity}})" class="w-1/2 px-4 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-blue-300">
                    <input type="number"  wire:model="detil.{{$index}}.price" wire:change="UpdateMedicinePrice({{$item->id}},{{$detil[$index]->price}})" class="w-1/2 px-4 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-blue-300"  name="" id="">
                    <br>

                    @endif
                    @endforeach

                    <hr>
                    <div class="md:flex mt-4 mb-4 items-center">
                        <label for="Total" class="w-1/2 block text-gray-700 text-lg font-medium ">Total</label>
                        <p>500.500</p>
                    </div>
                    <hr>

                    <div class="md:flex mt-4 items-center">
                        <label for="Total" class="w-1/2 block text-gray-700 text-lg font-medium ">Tipe Pembayaran</label>

                            <Select class="px-4 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-blue-300">
                                <option value="Kredit">Kredit</option>
                                <option value="Debit">Debit</option>
                                <option value="Tunai">Tunai</option>
                                {{-- <option value="">Lainnya</option> --}}
                            </Select>



                    </div>
                    <div class="md:flex mt-4 items-center">
                        <label for="Total" class="w-1/2 block text-gray-700 text-lg font-medium ">Deskripsi Pembayaran</label>

                         <input type="text" name="" id=""  class=" w-1/2 px-4 py-2 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-blue-300">

                    </div>
                    <div class="flex items-center justify-between">
                        <button
                          class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                          type="submit">
                          Submit
                        </button>
                      </div>

                </div>

            </div>
        </div>

    </form>
</div>
