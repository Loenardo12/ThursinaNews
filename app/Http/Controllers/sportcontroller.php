<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class sportcontroller extends Controller
{
    public function sport(Request $request)
    {
        $newskey= env ('NEWS_API_TUBE_KEY');

        $response = Http::get('https://api.apitube.io/v1/news/everything?language.code=en&category.id=medtop:15000000&api_key='.$newskey);

        if ($response->failed()) {
            $errorMessage = $response->clientError()
                ? "Client Error: " . $response->status()
                : "Server Error: " . $response->status();

            return view('sport', ['error' => $errorMessage]);
        }

        $newsData = $response->json();

        return view('sports', ['news' => $newsData]);
    }
}
