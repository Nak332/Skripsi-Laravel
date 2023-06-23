
            <div class="p-4">
                <p class="text-2xl font-bold">Delete antrian</p>

                <form class="space-y-4 md:space-y-6" action="/hapus-antrian/{{$antrian}}" method="POST">
                    @csrf

                    <p >Apakah anda ingin menghapus antrian ini?</p> 


                 
                    <div class="px-4 py-2 sm:flex sm:flex-row-reverse sm:px-6">
             
                        <button @click="open = false" type="submit" class="hover:outline hover:outline-1 mx-2 hover:outline-red-600 hover:bg-white hover:text-red-600 transition-all inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm  sm:ml-3 sm:w-auto">Hapus</button>
                    <button @click="open = false" type="button" class="mt-3 mx-2 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
               
                    </div>

                    </form>


        </div>
      