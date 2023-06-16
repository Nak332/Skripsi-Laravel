
<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!--
        Background backdrop, show/hide based on modal state.

    -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <!--
            Modal panel, show/hide based on modal state.
        -->
        <div x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            @click.outside="open = false" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                <p class="text-2xl font-bold">Input stok obat</p>

                <form class="space-y-4 md:space-y-6" action="/tambah-stock" method="POST">
                    @csrf

                        <div>

                           <input type="text" name="medicine_id" id='medicine_id' class="hidden" value="{{$medicine->id}}">

                            <label class="block mb-2 text-sm font-medium text-gray-900 " for="patient_id">Tanggal Kadaluarsa</label>

                            <input type="date" name="medicine_expired_date" id="medicine_expired_date" class='w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300'>
                            <br><br>
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 ">Stok</label>
                            <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" name="medicine_stock" id="medicine_stock">
                        </div>

                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button @click="open = false" type="submit" class="hover:outline hover:outline-1 hover:outline-blue-600 hover:bg-white hover:text-blue-600 transition-all inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm  sm:ml-3 sm:w-auto">Tambah</button>
                    <button @click="open = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>

                        {{-- <input wire:model='selected_patient' type="text"> --}}
                    </form>


        </div>
        </div>
    </div>
</div>
