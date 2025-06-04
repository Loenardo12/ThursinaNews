<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class technologycontroller extends Controller
{
    public function technology(Request $request)
    {
        $newskey= env ('NEWS_API_TUBE_KEY');

        $response = Http::get('https://api.apitube.io/v1/news/everything?language.code=en&category.id=medtop:20000225&api_key='.$newskey);
        if ($response->failed()) {
            $errorMessage = $response->clientError()
                ? "Client Error: " . $response->status()
                : "Server Error: " . $response->status();

            return view('technology', ['error' => $errorMessage]);
        }

        $newsData = $response->json();

        return view('technology', ['news' => $newsData]);
    }
}
