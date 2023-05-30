<div>
    <input type="text" 
    class="form-input w-full bg-gray-200 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 focus:outline-blue-700" 
    placeholder="Cari Pasien...."
    wire:model='query'>
    @foreach ($patients as $patient)
        <a href="" class="bg-black">{{ $patient->patient_name }}</a>
    @endforeach
</div>
