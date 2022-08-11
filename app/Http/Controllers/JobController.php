<?php

namespace App\Http\Controllers;

use App\Models\Job;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class JobController extends Controller
{
    public function index()
    {
        $client = new Client([
            'timeout' => 10
        ]);
        $url = 'https://www.bestjobs.eu/ro/locuri-de-munca-in-bucuresti/symfony';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        //
        $crawler = new Crawler($content);
        $data = $crawler->filter('.card.h-100')
            ->each(function (Crawler $node, $i) {
                $company = $node->filter('.h6.text-muted.text-truncate.py-2 > small')->text();
                $title = $node->filter('.h6.truncate-2-line > strong')->text();
                $location = $node->filter('.d-flex.min-width-3')->text();
                return [
                    'title' => $title,
                    'company' => $company,
                    'location' => $location
                ];
            });
        //
        Job::insert($data);
        dd($data);
    }
}
