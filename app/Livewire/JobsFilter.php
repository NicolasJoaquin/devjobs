<?php

namespace App\Livewire;

use App\Models\Rate;
use Livewire\Component;
use App\Models\Category;

class JobsFilter extends Component
{
    public $term;
    public $category;
    public $rate;
    public function readFormData() {
        $this->dispatch('find', $this->term, $this->category, $this->rate);
    }
    public function render()
    {
        $rates = Rate::all();
        $categories = Category::all();
        return view('livewire.jobs-filter', [
            'rates' => $rates,
            'categories' => $categories,
        ]);
    }
}
