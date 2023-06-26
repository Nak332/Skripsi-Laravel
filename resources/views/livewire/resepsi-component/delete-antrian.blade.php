
            <div class="p-4">
                <p class="text-2xl font-bold mx-5">Delete antrian</p>

                <form class="space-y-4 md:space-y-6" action="/hapus-antrian/{{$antrian}}" method="POST">
                    @csrf

                    <p class="mx-5">Apakah anda ingin menghapus antrian ini?</p> 


                 
                    <div class="px-4 py-2 sm:flex sm:flex-row-reverse sm:px-6">
             
                        <button @click="open = false" type="submit" class="rounded-lg font-bold bg-red-500 hover:bg-white hover:text-red-500 hover:outline hover:outline-red-500 outline-2 transition-all  text-sm px-5 py-2.5 mr-2 mb-2 text-center text-white">Hapus</button>
               
                    </div>

                    </form>


        </div>
      