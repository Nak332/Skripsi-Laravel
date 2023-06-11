<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Medicine;
use App\Models\MedicineDetail;



class TambahObat extends Component
{
    public $name;
    public $stock;
    public $expired_date;
    public $description;
    public $price;
    public $medicineDetail;
    public $medicine;

    protected $rules = [
      'name' => 'required|min:6',
      'stock' => 'required',
      'expired_date' => 'required',
      'description' => 'required',
      'price' => 'required',
    ];


    public function submit()
    {
        $this->validate();
        $medicine = new Medicine;
        $medicine->medicine_name =$this->name;
        $medicine->medicine_description = $this->description;
        $medicine->medicine_price = $this->price;
        $medicine->save();
        $medicineDetail = new MedicineDetail;
        $medicineDetail->medicine_id = $medicine->id;
        $medicineDetail->medicine_stock = $this->stock;
        $medicineDetail->medicine_expired_date = $this->expired_date;
        $medicineDetail->save();
        return redirect('/');
        // $medicine = Medicine::create([
        //     'medicine_name' => $this->name,
        //     'medicine_description' => $this->description,
        //     'medicine_price' => $this->price
        // ]);

        // MedicineDetail::create([
        //     'medicine_id' => $medicine->id,
        //     'medicine_expired_date' => $this->expired_date,
        //     'medicine_stock' => $this->stock
        // ]);
        

    }


    public function render()
    {
        return view('livewire.tambah-obat');
    }
}
