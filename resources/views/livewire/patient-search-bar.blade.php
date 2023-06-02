<div >
    <input type="text" 
    class="form-input w-full underline-offset-1 sm:text-sm rounded-lg block p-2.5 outline-0" 
    placeholder="Cari Pasien...." 
    wire:model='query'>
    <hr>
        @if ($query!='' or $selected_patient='')
            <select class="mt-3 w-full rounded-lg bg-gray-200 border border-gray-300 text-gray-900 p-2" wire:model='selected_patient' name="" id="selected_patient">
           
            <option value=""@if (empty($patient)) disabled selected @endif>
                @if (empty($patient))
                    
                    Pasien tidak ditemukan
                    
                @endif

            </option>
            @foreach ($patient as $p)
            {{-- <div class='w-full'>{{ $p['patient_name'] }}</div> --}}
                    <option class="" value="{{$p['patient_name']}}">{{$p['patient_name']}}</option>
            @endforeach
        </select>             
        @endif
      

       

    {{-- <p class="w-3/5 bg-red">{{$selected_patient}}</p> --}}
</div>
