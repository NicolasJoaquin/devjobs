<?php

namespace App\Livewire;

use App\Models\Job;
use App\Models\Rate;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class EditJob extends Component
{
    public $id;
    public $title;
    public $rate_id;
    public $category_id;
    public $company;
    public $last_date;
    public $description;
    public $image;
    public $new_image;

    use WithFileUploads;

    protected $rules =[
        "title" => "required|string",
        "rate_id" => "required",
        "category_id" => "required",
        "company" => "required|string",
        "last_date" => "required",
        "description" => "required",
        "new_image" => "nullable|image|max:1024", // Cuando es nullable puede ir vacío pero sigue corriendo el resto de validaciones en caso de tener algo
    ];

    public function mount(Job $job) { // Hook de Livewire para saber cuando se montó el componente
        $this->id = $job->id;
        $this->title = $job->title;
        $this->rate_id = $job->rate_id;
        $this->category_id = $job->category_id;
        $this->company = $job->company;
        $this->last_date = Carbon::parse($job->last_date)->format('Y-m-d'); // Usando Carbon para formatear la fecha que viene desde la db
        $this->description = $job->description;
        $this->image = $job->image;
    }
    public function editJob() {
        $data = $this->validate();
        /* Encontrar la vacante a editar */
        $job = Job::find($this->id);
        /* Reviso si hay una nueva imagen */
        if($this->new_image) {
            $image = $this->new_image->store('public/jobs');
            $data['image'] = str_replace('public/jobs/', '', $image); 
            Storage::delete('public/jobs' . $job->image);
        } 
        /* Asignar los valores */
        $job->title = $data['title'];
        $job->rate_id = $data['rate_id'];
        $job->category_id = $data['category_id'];
        $job->company = $data['company'];
        $job->last_date = $data['last_date'];
        $job->description = $data['description'];
        $job->image = $data['image'] ?? $job->image;
        /* Guardar la vacante */
        $job->save();
        session()->flash('message', 'La vacante de empleo se actualizó correctamente');
        return redirect()->route('jobs.index');
    }
    public function render()
    {
        $rates = Rate::all();
        $categories = Category::all();
        return view('livewire.edit-job', [
            'rates'=> $rates,
            'categories'=> $categories,
        ]);
    }
}
