<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Job;
use App\Models\Rate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateJob extends Component
{
    public $title;
    public $rate_id;
    public $category_id;
    public $company;
    public $last_date;
    public $description;
    public $image;

    use WithFileUploads;

    protected $rules =[
        "title" => "required|string",
        "rate_id" => "required",
        "category_id" => "required",
        "company" => "required|string",
        "last_date" => "required",
        "description" => "required",
        "image" => "required|image|max:1024",
    ];
    public function createJob()
    {
        $data = $this->validate();
        $image = $this->image->store('public/jobs');
        $image_name = str_replace('public/jobs/', '', $image);
        Job::create([
            "title" => $data["title"],
            "rate_id" => $data["rate_id"],
            "category_id" => $data["category_id"],
            "company" => $data["company"],
            "last_date" => $data["last_date"],
            "description" => $data["description"],
            "image" => $image_name,
            "user_id" => auth()->user()->id,
        ]);
        session()->flash('message', 'El empleo se publicó correctamente');
        return redirect()->route('jobs.index');
    }
    public function render()
    {
        $rates = Rate::all();
        $categories = Category::all();
        return view('livewire.create-job', [
            'rates' => $rates,
            'categories' => $categories,
        ]);
    }
}
