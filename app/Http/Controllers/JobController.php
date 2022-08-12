<?php

namespace App\Http\Controllers;

use App\Services\JobService;

class JobController extends Controller
{
    public function index()
    {
        $content = JobService::getHtmlTemplate();
        JobService::crawlContentAndCreateJobRecord($content);

        return 'true';
    }
}
