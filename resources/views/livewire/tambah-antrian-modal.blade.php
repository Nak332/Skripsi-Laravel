
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
        <div wire:model='patients' x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            @click.outside="open = false" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">

                <form class="space-y-4 md:space-y-6" action="/tambah-antrian" method="POST">
                    @csrf
                    {{-- Test dropdown select --}}


                    {{-- searchbar --}}
                        <div>

                            <div class="pb-4">
                                @livewire('patient-search-bar')
                            </div>

                            @if ($selected_patient)
                            <label class="block mb-2 text-sm font-medium text-gray-900 " for="patient_id">Pasien</label>
                            <div>
                                <p class="font-bold text-white rounded-lg bg-blue-500 p-3"> {{$selected_patient['patient_name']}}</p>
                            </div>
                            <input type="text" name="patient_id" id="patient_id" class='hidden' value="{{$selected_patient['id']}}">
                            @endif



                            <br><br>

                        </div>
                        {{-- <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal</label>
                            <input type="date" name="email" id="email" class="bg-gray-200 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="name@company.com" required="">
                        </div> --}}
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 ">Keluhan</label>
                            <textarea class="bg-gray-200 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" name="keluhan" id="keluhan" cols="30" rows="10"></textarea>
                        </div>


                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 ">Tipe Kunjungan</label>
                            <select class=" w-full rounded-lg bg-gray-200 border border-gray-300 text-gray-900 p-2" name="appointment_type" id="appointment_type">
                                <option value="scheduled">Kunjungan Langsung</option>
                                <option value="on_the_spot">Kunjungan Janjian</option>
                            </select>
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
