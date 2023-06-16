<div class="container mx-auto p-4">
        <div class="min-h-screen flex items-center justify-center">
            <div class="max-w-screen-sm w-full mx-auto bg-white p-8 rounded-md shadow-md">
                <div class="drop-shadow flex-inline text-center text-black p-6 m-4 rounded-lg text-4xl w-128 h-fit">
                    <p class="font-bold text-black">Add Medicine</p>
                    </div>
              <form method="POST" wire:submit.prevent="submit"  enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                  <label for="medicine_name" class="block text-gray-700 text-sm font-medium mb-2">Nama</label>
                  <input type="text" name="medicine_name" id="medicine_name" wire:model="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Nama obat">
                  @error('name') <span class="error text-red-500">Nama harus diisi</span> @enderror
                </div>
                <div class="mb-4">
                  <label for="medicine_stock" class="block text-gray-700 text-sm font-medium mb-2">Stok</label>
                  <input type="text" name="medicine_stock" id="medicine_stock" wire:model="stock" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Stok obat">
                  @error('stock') <span class="error text-red-500">Stok harus diisi dengan angka</span> @enderror
                </div>
                <div class="mb-4">
                  <label for="medicine_expired_date" class="block text-gray-700 text-sm font-medium mb-2">Tanggal Kadaluarsa</label>
                  <input type="date" name="medicine_expired_date" id="medicine_expired_date" wire:model="expired_date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Tanggal kadaluarsa obat">
                  @error('expired_date') <span class="error text-red-500">Tanggal kadaluarsa harus diisi</span> @enderror

                </div>
                    <div class="mb-4">
                        <label for="medicine_description" class="block text-gray-700 text-sm font-medium mb-2">Deskripsi</label>
                        <textarea rows="2" name="medicine_description" id="medicine_description" wire:model="description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Deskripsi obat..."></textarea>
                        @error('description') <span class="error text-red-500">Deskripsi harus diisi</span> @enderror
                    </div>
                    
                <div class="mb-4">
                  <label for="medicine_price" class="block text-gray-700 text-sm font-medium mb-2">Harga</label>
                  <input type="text" name="medicine_price" id="medicine_price" wire:model="price" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder="Harga obat">
                  @error('price') <span class="error text-red-500">Harga harus diisi dengan angka</span> @enderror
                </div>
                  <div class="flex justify-center">
                    <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
 {{--       wire:submit.prevent="submit" --}}




