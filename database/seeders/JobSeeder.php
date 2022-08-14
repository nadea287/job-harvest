<?php

namespace Database\Seeders;

use App\Models\Cv;
use App\Models\Job;
use App\Services\JobService;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cv::factory()->count(10)->create();
        $content = JobService::getHtmlTemplate();
        JobService::crawlContentAndCreateJobRecord($content);

        foreach (Job::all() as $job) {
            $cvs = Cv::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $job->cvs()->attach($cvs);
        }
    }
}
