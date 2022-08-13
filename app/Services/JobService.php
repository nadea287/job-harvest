<?php

namespace App\Services;

use App\Models\Job;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Database\QueryException;
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
            report($exception);
            return false;
        }

    }

    public static function crawlContentAndCreateJobRecord($content)
    {
        $crawler = new Crawler($content);
        $crawler->filter('.card.h-100')
            ->each(function (Crawler $node, $i) {
                return self::getJobFields($node);
            });
    }

    private static function createJob($title, $company, $location)
    {
        try {
            Job::updateOrCreate(
                [
                    'title' => $title,
                    'company' => $company,
                ],
                [
                    'location' => $location
                ]
            );
        } catch (QueryException $exception) {
            Log::error($exception->getMessage());
            return false;
        }
    }

    private static function getJobFields($node)
    {
        $company = $node->filter('.h6.text-muted.text-truncate.py-2 > small')->text();
//        $company = null;
        $title = $node->filter('.h6.truncate-2-line > strong')->text();
        $location = $node->filter('.d-flex.min-width-3')->text();

        return self::createJob($title, $company, $location) === false ? false : true;
    }

}
