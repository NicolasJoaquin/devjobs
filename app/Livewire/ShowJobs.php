<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;

class ShowJobs extends Component
{
    public function render()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.show-jobs', [
            'jobs'=> $jobs,
        ]);
    }
}
