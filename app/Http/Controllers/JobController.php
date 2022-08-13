<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Services\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $content = JobService::getHtmlTemplate();
        JobService::crawlContentAndCreateJobRecord($content);
        $jobs = Job::all();

        return view('jobs.index', compact('jobs'));
    }

    public function search(Request $request)
    {
        $output = null;
        $jobs = Job::whereRaw("MATCH (`title`, `company`, `location`) AGAINST (? IN BOOLEAN MODE)",
            [$request->search])->get();
        foreach ($jobs as $job) {
            $output .=
                '<tr>
                    <td> ' . $job->title . ' </td>
                    <td> ' . $job->company . ' </td>
                    <td> ' . $job->location . ' </td>
                    </tr>';
        }

        return response($output);
    }
}
