<div class="">

    <div class="justify-center m-4">
        @livewire('medicine-search-bar')
    </div>

    <div class="overflow-y-auto h-96 ">


        @if ($obat)
        <div class="w-full ">

            @foreach ($obat as $index => $o)

            <div class="flex drop-shadow-sm  justify-center p-4 ">
                <div class="border border-gray-300 rounded-tl py-2 justify-between rounded-bl w-full">

                    <div class="items-start flex justify-between px-4">
                        <div class="items-center w-10/12">
                            <div class="w-full text-black">{{$obat_name[$index]}}</div>
                        </div>
                        <div class="items-start text-end">
                            <p>
                                Jumlah:
                            </p>
                            <input
                                wire:model="qty.{{ $index }}"
                                type="number"
                                wire:change="updateParentData"
                                class=" rounded-md w-3/5 border outline-none p-1 border-gray-300"
                                placeholder="99"
                            />
                        </div>
                    </div>
                    <div class="w-full mt-2 ">
                        <hr>
                    </div>


                    <div class="flex justify-between mt-2 px-4 items-start">

                            <div class="w-1/2">
                                <p>Dosis:</p>
                                <textarea
                                    rows="2"
                                    wire:model="obat_dose.{{ $index }}"
                                    type="text"
                                    wire:change="updateParentData"
                                    class="p-1 rounded-md w-full border outline-none border-gray-300"
                                    placeholder="1 Tablet 3 kali sehari"
                                ></textarea>
                            </div>



                            <div class="w-1/2 justify-end text-end">
                                <p>Tipe Konsumsi:</p>
                                <select
                                wire:model="obat_consump_type.{{ $index }}"
                                name="consumption_type"
                                id=""
                                class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                            >
                                <option value="Kapsul">Kapsul</option>
                                <option value="Tablet">Tablet</option>
                                <option value="Sirup">Sirup</option>
                                <option value="Salep">Salep</option>
                            </select>
                            </div>


                    </div>
                </div>


                <div wire:click="remove({{ $index }})"
                class="bg-red-500 rounded-br w-1/12 p-3 flex align-middle text-center justify-center items-center border border-red-500 rounded-tr  text-white font-bold cursor-pointer hover:bg-white hover:text-red-500 transition-all">
                    <p>X</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
    @if ($transact_rekam or $medicine_purchase)
    <div class="flex">
        <div class="cursor-pointer bg-green-500 w-fit m-4 p-2 rounded hover:outline hover:outline-green-500 hover:bg-white hover:text-green-500 transition-all text-center text-white font-bold"  wire:click="wireChangeDataTransaction">Simpan</div>
    </div>
        




@endif
</div>
