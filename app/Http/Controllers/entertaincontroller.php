<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class entertaincontroller extends Controller
{
    public function entertain(Request $request)
    {
        $newskey= env ('NEWS_API_TUBE_KEY');

        $response = Http::get('https://api.apitube.io/v1/news/everything?language.code=en&category.id=medtop:01000000&api_key='.$newskey);


        if ($response->failed()) {
            $errorMessage = $response->clientError()
                ? "Client Error: " . $response->status()
                : "Server Error: " . $response->status();

            return view('entertain', ['error' => $errorMessage]);
        }

        $newsData = $response->json();

        return view('entertain', ['news' => $newsData]);
    }
}
