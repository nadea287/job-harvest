<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class JobController extends Controller
{
    public function index()
    {
        $client = new Client();
        $url = 'https://www.bestjobs.eu/ro/locuri-de-munca-in-bucuresti';
        $response = $client->request('POST', $url, [
            'title' => 'Programator PHP',
//            'company' =>
        ]);
        $content = $response->getBody()->getContents();
        //https://codebriefly.com/how-to-handle-content-scraping-in-laravel/

//        $responde = Http::get('https://www.bestjobs.eu/ro/locuri-de-munca-in-bucuresti/symfony');
//        dd(json_decode($responde->body()));
//        dd($responde);
    }
}
