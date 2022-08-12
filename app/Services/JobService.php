<?php

namespace App\Services;

use App\Models\Job;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;

class JobService
{
    public static function getHtmlTemplate()
    {
        $client = new Client([
            'timeout' => 10
        ]);
        try {
            $response = $client->request('GET', 'https://www.bestjobs.eu/ro/locuri-de-munca-in-bucuresti/symfony');
            return $response->getBody()->getContents();
        } catch (ConnectException $exception) {
            Log::error($exception);
//            throw new \Exception("Something went wrong...");
        }

    }

    public static function crawlContentAndCreateJobRecord($content)
    {
        $crawler = new Crawler($content);
        $crawler->filter('.card.h-100')
            ->each(function (Crawler $node, $i) {
//                $company = $node->filter('.h6.text-muted.text-truncate.py-2 > small')->text();
                $company = null;
                $title = $node->filter('.h6.truncate-2-line > strong')->text();
                $location = $node->filter('.d-flex.min-width-3')->text();
                self::createJob($title, $company, $location);
            });
    }

    private static function createJob($title, $company, $location)
    {
        Job::updateOrCreate(
            [
                'title' => $title,
                'company' => $company,
            ],
            [
                'location' => $location
            ]
        );
    }

}
