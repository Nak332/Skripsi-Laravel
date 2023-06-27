<div class="p-6">
    <div class="mb-4">
        <label for="hasil_anamnesis" class="block text-black text-sm font-medium mb-2">Anamnesis</label>
        <textarea name="anamnesis" id="anamnesis" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=""></textarea>
     </div>
     <div class="mb-4">
        <label for="suhu_badan" class="block text-black text-sm font-medium mb-2">Suhu Badan</label>
        <div class="flex">
           <input type="number" name='body_temperature' step="0.1" min="25" max="45" id="body_temperature" class="md:w-1/4 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=36 >
           <div class=" p-3">
              <h1>° C</h1>
           </div>
        </div>
     </div>
     <div class="mb-4">
        <label for="suhu_badan" class="block text-black text-sm font-medium mb-2">Gula Darah</label>
        <div class="flex">
           <input type="number" name='blood_sugar' id="blood_sugar" class="md:w-1/4 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=2 >
            <div class=" p-3">
                <h1 class="text-xl">%</h1>
            </div>
        </div>
     </div>
       <div class="md:flex inline">
           <div class="mb-4 w-1/2">
               <label for="suhu_badan" class="block text-black text-sm font-medium mb-2">Tinggi Badan</label>
               <div class="flex">
                   <input type="number" name='height' id="height" class="md:w-1/2  px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=120 >
                   <div class=" p-3">
                       <h1>cm</h1>
                   </div>
               </div>
           </div>
           <div class="mb-4 w-1/2">
               <label for="suhu_badan" class="block text-black text-sm font-medium mb-2">Berat Badan</label>
               <div class="flex">
                   <input type="number" name='weight' id="weight" class="md:w-1/2 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=80 >
                   <div class=" p-3">
                       <h1>kg</h1>
                   </div>
               </div>
           </div>
       </div>
     <div class="md:flex inline">
        <div class="mb-4 w-1/2">
           <label for="suhu_badan" class="block text-black text-sm font-medium mb-2">Sistol</label>
           <div class="flex">
              <input type="number" name='sistol' id="sistol" class="md:w-1/2  px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=120 >
              <div class=" p-3">
                 <h1>mmHg</h1>
              </div>
           </div>
        </div>
        <div class="mb-4 w-1/2">
           <label for="suhu_badan" class="block text-black text-sm font-medium mb-2">Diastol</label>
           <div class="flex">
              <input type="number" name='diastol' id="diastol" class="md:w-1/2 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=80 >
              <div class=" p-3">
                 <h1>mmHg</h1>
              </div>
           </div>
        </div>
     </div>

     <div class="mb-4">
      <label for="suhu_badan" class="block text-black text-sm font-medium mb-2">Denyut Nadi / Jantung</label>
      <div class="flex">
         <input type="number" name='pulse' id="pulse" class="md:w-1/4 px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:ring-blue-300" placeholder=70 >

        </div>
</div>
