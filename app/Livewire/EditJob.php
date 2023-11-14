<?php

namespace App\Livewire;

use App\Models\Rate;
use Livewire\Component;
use App\Models\Category;

class EditJob extends Component
{
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
