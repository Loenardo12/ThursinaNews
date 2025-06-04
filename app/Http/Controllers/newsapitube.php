<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class newsapitube extends Controller
{
    public function makeRequest(Request $request)
    {
        $newskey= env ('NEWS_API_TUBE_KEY');

        $response = Http::get('https://api.apitube.io/v1/news/top-headlines?api_key='.$newskey);


        if ($response->failed()) {
            $errorMessage = $response->clientError()
                ? "Client Error: " . $response->status()
                : "Server Error: " . $response->status();

            return view('index', ['error' => $errorMessage]);
        }

        $newsData = $response->json();

        return view('index', ['news' => $newsData]);
    }
    public function entertain(Request $request)
    {
        $newskey= env ('NEWS_API_TUBE_KEY');

        $response = Http::get('https://api.apitube.io/v1/news/everything?language.code=en&category.id=medtop:01000000&api_key='.$newskey);


        if ($response->failed()) {
            $errorMessage = $response->clientError()
                ? "Client Error: " . $response->status()
                : "Server Error: " . $response->status();

            return view('index', ['error' => $errorMessage]);
        }

        $newsData = $response->json();

        return view('index', ['news' => $newsData]);
    }

}
