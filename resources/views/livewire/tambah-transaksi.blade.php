<div class="p-4">


<form class="space-y-4 md:space-y-6" action="/tambah-transaksi" method="POST">
    @csrf
    {{-- Test dropdown select --}}


    {{-- searchbar --}}

        {{-- <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal</label>
            <input type="date" name="email" id="email" class="bg-gray-200 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="">
        </div> --}}


        <div>
            <label for="" class="block mb-2 text-sm font-medium text-gray-900 ">Tipe Transaksi</label>
            <select wire:model='selected_type' class=" w-full rounded-lg bg-gray-200 border border-gray-300 text-gray-900 p-2" name="treatment" id="treatment">
                <option  value="medicine_purchase" selected>Pembelian Obat</option>
                <option  value="Tes Darah">Tes Darah</option>
                <option  value="Tes Urin">Tes Urin</option>
                <option  value="Vaksin">Vaksin</option>
            </select>
        </div>
        <div>
            @if ($selected_type!='medicine_purchase')
            <div class="pb-4">
                @livewire('patient-search-bar')
            </div>

                @if ($selected_patient)
                <label class="block mb-2 text-sm font-medium text-gray-900 " for="patient_id">Pasien</label>
                <div>
                    <p class="font-bold text-white rounded-lg bg-blue-500 p-3 truncate">
                        {{$selected_patient['patient_name']}} <br>
                        Nomor Pasien {{$selected_patient['id']}}    <br>
                        {{$selected_patient['patient_address']}} <br>
                        {{$selected_patient['patient_phone']}}
                    </p>
                    </p>
                </div>
                <input type="text" name="patient_id" id="patient_id" class='hidden' value="{{$selected_patient['id']}}">
                <input type="text" name="employee_id" id="employee_id" class='hidden' value="{{Auth::user()->employee_id}}">

                @endif

            @endif

        </div>

    <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
        <button type="submit" class="rounded-lg font-medium bg-green-500 hover:bg-white hover:text-green-500 hover:outline hover:outline-green-500 outline-2 transition-all text-sm px-4 py-2.5 mr-2 mb-2 text-center text-white">Tambah</button>
    </div>

        {{-- <input wire:model='selected_patient' type="text"> --}}
</form>
</div>
