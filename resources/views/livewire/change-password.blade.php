<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  
    <div class="fixed inset-0 z-10 overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div x-show="open"
          x-transition:enter="transition ease-out duration-300"
          x-transition:enter-start="opacity-0 scale-90"
          x-transition:enter-end="opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-300"
          x-transition:leave-start="opacity-100 scale-100"
          x-transition:leave-end="opacity-0 scale-90"
          @click.outside="open = false"
          class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <p class="text-2xl font-bold text-center">Change Password</p>
            <form action="/change-password" method="POST">
              @csrf
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
              @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                  {{ session('error') }}
                </div>
              @endif
              <div class="mb-6 mx-4">
                <label class="block text-gray-700 font-bold mb-2" for="password_old">
                  Old Password
                </label>
                @error('password_old')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                <input class="appearance-none border border-gray-300 rounded w-full py-2 leading-tight focus:outline-none focus:shadow-outline"
                  id="password_old" name="password_old" type="password" placeholder="" required>
              </div>
              <div class="mb-6 mx-4">
                <label class="block text-gray-700 font-bold mb-2" for="password_new">
                  New Password
                </label>
                @error('password_new')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                <input class="appearance-none border border-gray-300 rounded w-full py-2 leading-tight focus:outline-none focus:shadow-outline"
                  id="password_new" name="password_new" type="password" placeholder="" required>
              </div>
              <div class="mb-6 mx-4">
                <label class="block text-gray-700 font-bold mb-2" for="password_new_confirmation">
                  Confirm Password
                </label>
                <input class="appearance-none border border-gray-300 rounded w-full py-2 leading-tight focus:outline-none focus:shadow-outline"
                  id="password_new_confirmation" name="password_new_confirmation" type="password" placeholder="" required>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
              <button @click="open = false"
                class="hover:outline hover:outline-1 hover:outline-blue-600 hover:bg-white hover:text-blue-600 transition-all inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto"
                type="submit">Update</button>
              <button @click="open = false"
                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                type="button">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  