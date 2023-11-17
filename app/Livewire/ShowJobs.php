<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ShowJobs extends Component
{
    protected $listeners = ["deleteJob"];
    public function deleteJob(Job $job) {
        if( $job->image ) {
            Storage::delete('public/jobs/' . $job->image);            
        } 
        // if( $job->applicants->count() ) {
        //     foreach( $job->applicants as $applicant ) {
        //         if( $applicant->cv ) {
        //             Storage::delete('public/cv/' . $applicant->cv);
        //         }
        //     }
        // }
        $job->delete();
    }
    public function render()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.show-jobs', [
            'jobs'=> $jobs,
        ]);
    }
}
