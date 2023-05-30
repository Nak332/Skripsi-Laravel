<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;

class PatientSearchBar extends Component
{
    public $query;
    public $patient;
    public $highlightIndex;

    public function updatedQuery(){
        $this->patient = Patient::where('patient_name','like','%'.$this->query.'%')
        ->get()
        ->toArray();
    }
     
    // public function reset()
    // {
    //     $this->query = '';
    //     $this->contacts = [];
    //     $this->highlightIndex = 0;
    // }
 
    public function mount()
    {
        $this->query='';
        $this->patient='';
    }
 
    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->contacts) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }
 
    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->contacts) - 1;
            return;
        }
        $this->highlightIndex--;
    }
 
    public function selectContact()
    {
        $contact = $this->contacts[$this->highlightIndex] ?? null;
        if ($contact) {
            $this->redirect(route('show-contact', $contact['id']));
        }
    }
 
    // public function updatedQuery()
    // {
    //     $this->contacts = Contact::where('name', 'like', '%' . $this->query . '%')
    //         ->get()
    //         ->toArray();
    // }
 

    public function render()
    {
        return view('livewire.patient-search-bar');
    }
    
}
