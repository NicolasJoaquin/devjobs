<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyJob extends Component
{
    use WithFileUploads;
    public $cv;
    protected $rules = [
        "cv" => "required|mimes:pdf",
    ];
    public function apply() {
        $data = $this->validate();
        $cv = $this->cv->store('public/cv');
        $cv_name = str_replace('public/cv/', '', $cv);
    }
    public function render()
    {
        return view('livewire.apply-job');
    }
}
