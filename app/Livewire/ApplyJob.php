<?php

namespace App\Livewire;

use App\Models\Job;
use App\Notifications\NewApplicant;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyJob extends Component
{
    use WithFileUploads;
    public $cv;
    public $job;
    protected $rules = [
        "cv" => "required|mimes:pdf",
    ];
    public function mount(Job $job) {
        $this->job = $job;
    }
    public function apply() {
        // Se almacena el cv
        $data = $this->validate();
        $cv = $this->cv->store('public/cv');
        $cv_name = str_replace('public/cv/', '', $cv);
        // Se crea el candidato de la vacante
        $this->job->applicants()->create([ 
            'user_id' => auth()->user()->id,
            'cv' => $cv_name,
        ]);
        // Crear notificación y enviar mails
        $this->job->recruiter->notify(new NewApplicant($this->job->id, $this->job->title, auth()->user()->id));
        // Se muestra un mensaje al usuario de éxito al postularse
        session()->flash('message', 'Te postulaste con éxito al empleo, ¡mucha suerte!');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.apply-job');
    }
}
