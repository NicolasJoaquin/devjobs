<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Rate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateJob extends Component
{
    public $title;
    public $rate;
    public $category;
    public $company;
    public $last_date;
    public $description;
    public $image;
    use WithFileUploads;
    protected $rules =[
        "title" => "required|string",
        "rate" => "required",
        "category" => "required",
        "company" => "required|string",
        "last_date" => "required",
        "description" => "required",
        "image"=> "required|image|max:1024",
    ];
    public function createJob()
    {
        $data = $this->validate();
        // Post::create([
        //     'title' => $this->title,
        //     'content' => $this->content,
        // ]);
 
        // return redirect()->to('/posts');
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
