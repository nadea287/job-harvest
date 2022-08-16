<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    public function search(Request $request)
    {
        $jobs = Job::whereRaw("MATCH (`title`, `company`, `location`) AGAINST (? IN BOOLEAN MODE)",
            [$request->get('search')])
            ->get();

        return response($jobs);
    }

    public function show(Job $job)
    {
        $cvs = $job->cvs->sortByDesc(function ($item) {
            return $item->score;
        });

        return view('jobs.show', compact('job', 'cvs'));
    }
}
