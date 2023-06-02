<div x-data="{open: False}">
    <input type="text" x-on
    class="form-input w-full bg-gray-200 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 focus:outline-blue-700" 
    placeholder="Cari Pasien...."
    wire:model='query'>
    <div class="inline h-3 overflow-y-scroll bg-slate-400 outline-red-400">
        @foreach ($patient as $p)
        <div class='w-full'>{{ $p['patient_name'] }}</div>
        @endforeach
    </div>
    
</div>
