<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Services\JobService;

class JobController extends Controller
{
    public function index()
    {
        $content = JobService::getHtmlTemplate();
        JobService::crawlContentAndCreateJobRecord($content);
        $jobs = Job::all();

        return view('jobs.index', compact('jobs'));
    }
}
