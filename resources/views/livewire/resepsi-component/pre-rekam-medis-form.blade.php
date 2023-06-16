<div class="p-4">

    <div class="mb-4">
        <label  class="block text-gray-700 text-sm font-medium mb-2">Pasien</label>
        <div class="bg-blue-500 text-white font-bold w-full rounded p-4">
            A1 - Tes
        </div>
    </div>
   
    <form action="">
        @csrf
        <div class="mb-4">
            <label for="keluhan" class="block text-gray-700 text-sm font-medium mb-2">Keluhan</label>
            <textarea name="complaint" id="complaint" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
         </div>
    
         <div class="mb-4">
            <label for="suhu_badan" class="block text-gray-700 text-sm font-medium mb-2">Suhu Badan</label>
            <div class="flex">
               <input type="number" name='body_temperature' step="0.1" min="25" max="45" id="body_temperature" class="md:w-1/4 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=36 >
               <div class=" p-3">
                  <h1>° C</h1>
               </div>
            </div>
         </div>
        
         <div class="mb-4">
            <label for="suhu_badan" class="block text-gray-700 text-sm font-medium mb-2">Gula Darah</label>
            <div class="flex items-center">
               <input type="number" name='blood_sugar' id="blood_sugar" class="md:w-1/4 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=36 min="0"  >
                <p class="pl-2">mg/dL</p>
            </div>
         </div>
         <div class="md:flex inline">
            <div class="mb-4 w-1/2">
               <label for="suhu_badan" class="block text-gray-700 text-sm font-medium mb-2">Sistol</label>
               <div class="flex">
                  <input type="number" name='sistol' id="sistol" class="md:w-1/2  px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=120 >
                  <div class=" p-3">
                     <h1>mmHg</h1>
                  </div>
               </div>
            </div>
            <div class="mb-4 w-1/2">
               <label for="suhu_badan" class="block text-gray-700 text-sm font-medium mb-2">Diastol</label>
               <div class="flex">
                  <input type="number" name='diastol' id="diastol" class="md:w-1/2 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=80 >
                  <div class=" p-3">
                     <h1>mmHg</h1>
                  </div>
               </div>
            </div>
         </div>
         <div class="mb-4">
            <label for="suhu_badan" class="block text-gray-700 text-sm font-medium mb-2">Pulse</label>
            <div class="flex">
               <input type="number" name='pulse' id="pulse" class="md:w-1/4 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=70 >
    
            </div>
         </div>

    </form>
    <hr>
    

     <button class="mt-4 bg-green-500 text-white hover:bg-white hover:text-green-500 transition-all outline hover:outline-1 hover:outline-green-500 font-bold rounded p-2">
        + Hasil Tes
        
     </button>
</div>
