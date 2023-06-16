<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
use App\Models\MedicineDetail;
use Illuminate\Support\Collection;
use Livewire\Component;

class MedicineSearchBar extends Component
{

    public $patients = []; //Unused, isinya semua patients dari previous page
    public $query; //Query Searchbar
    public $selected_medicine; //pasien yang terpilih
    public $medicines; //Untuk Dropdown rekomendasi
    public $highlightIndex;




    public function updatedQuery(){
        $this->medicines= Medicine::where('medicine_name','like','%'.$this->query.'%')
        ->get()
        ->toArray();
    }

    public function clear(){
        $this->query='';
        $this->selected_medicine='';
    }


    public function addMedicine($id){
        $this->selected_medicine= Medicine::findorFail($id);
        $this->medicines = collect(['id'=> $this->selected_medicine->id,'name'=>$this->selected_medicine->medicine_name,'qty'=> '0']);
        $this->sendMedicineToParentComponent($id);

    }

    public function setQuery($incoming_query){
        $this->query = $incoming_query;
    }

    public function sendMedicineToParentComponent($id)
    {
        $this->emitUp('medicineSent', ['obat' =>$id]);


    }



    public function mount()
    {
        $this->query='';
        $this->medicines=[];
        // $this->prescription = collect(
        //     [
        //         ['id'=> 1,'name'=>'nakara','qty'=> 3],
        //         ['id'=> 2,'name'=>'satria','qty'=> 3]
        //     ]);


    }


    public function render()
    {
        return view('livewire.obat-component.medicine-search-bar');
    }
}
