<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;

class HomeJobs extends Component
{
    public $term;
    public $category;
    public $rate;
    protected $listeners = [
        'find' => 'find',
    ];
    public function find($term, $category, $rate) {
        $this->term = $term;
        $this->category = $category;
        $this->rate = $rate;
    }
    public function render()
    {
        // $jobs = Job::all();
        $jobs = Job::when($this->term, function ($query) { // El callback del when se ejecuta sólo cuando hay algo en el primer parámetro
            $query
            ->where('title', 'LIKE', '%'.$this->term.'%')
            ->orWhere('company', 'LIKE', '%'.$this->term.'%');
        })
        ->when($this->category, function ($query) {
            $query->where('category_id', $this->category);
        })
        ->when($this->rate, function ($query) { 
            $query->where('rate_id', $this->rate);
        })
        ->get();
        return view('livewire.home-jobs', [
            'jobs' => $jobs,
        ]);
    }
}
