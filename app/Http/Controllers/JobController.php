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
        $output = null;
        $jobs = Job::whereRaw("MATCH (`title`, `company`, `location`) AGAINST (? IN BOOLEAN MODE)",
            [$request->search])->get();
        foreach ($jobs as $job) {
            $output .=
                '<tr>
                    <td> <a href="/jobs/' . $job->id . '">' . $job->title . '</a> </td>
                    <td> ' . $job->company . ' </td>
                    <td> ' . $job->location . ' </td>
                    </tr>';
        }

        return response($output);
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }
}
