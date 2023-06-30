
<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!--
        Background backdrop, show/hide based on modal state.

    -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10">
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
                <p class="text-2xl font-bold">Deactivate User</p>

                <form class="space-y-4 md:space-y-6" action="/disable-employee/{{$employee->id}}" method="POST">
                    @csrf

                          <p wire:model="currentEmployee">Apakah anda ingin menonaktifkan akun {{$employee->employee_name}}?</p>

                    <div class=" px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button @click="open = false" type="submit" class="rounded-lg font-medium bg-red-500 hover:bg-white hover:text-red-500 hover:outline hover:outline-red-500 outline-2 transition-all text-sm px-4 py-2.5 mr-2 mb-2 text-center text-white">Deaktivasi</button>
                    <button @click="open = false" type="button" class="rounded-lg font-medium bg-red-500 hover:bg-white hover:text-red-500 hover:outline hover:outline-red-500 outline-2 transition-all text-sm px-4 py-2.5 mr-2 mb-2 text-center text-white">Cancel</button>
                    </div>

                        {{-- <input wire:model='selected_patient' type="text"> --}}
                    </form>


            </div>
        </div>
    </div>
</div>
