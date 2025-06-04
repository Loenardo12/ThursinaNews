<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class politiccontroller extends Controller
{
    public function politic(Request $request)
    {
        $newskey= env ('NEWS_API_TUBE_KEY');

        $response = Http::get('https://api.apitube.io/v1/news/everything?language.code=en&category.id=medtop:11000000&api_key='.$newskey);


        if ($response->failed()) {
            $errorMessage = $response->clientError()
                ? "Client Error: " . $response->status()
                : "Server Error: " . $response->status();

            return view('politic', ['error' => $errorMessage]);
        }

        $newsData = $response->json();

        return view('politic', ['news' => $newsData]);
    }
}
