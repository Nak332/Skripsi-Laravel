<div >
    <input type="text" 
    class="form-input w-full bg-gray-200 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 focus:outline-blue-700" 
    placeholder="Cari Pasien...."
    wire:model='query'>
        <select class="mt-3 w-full rounded-lg bg-gray-200 border border-gray-300 text-gray-900 p-2" wire:model='selected_patient' name="" id="selected_patient">

            @foreach ($patient as $p)
            {{-- <div class='w-full'>{{ $p['patient_name'] }}</div> --}}
            <option class="" value="{{$p['patient_name']}}">{{$p['patient_name']}}</option>
            @endforeach
        </select>

       

    asdqwe
    <p class="w-3/5 bg-red">{{$selected_patient}}</p>
</div>
