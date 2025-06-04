<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class businesscontroller extends Controller
{
    public function business(Request $request)
    {
        $newskey= env ('NEWS_API_TUBE_KEY');

        $response = Http::get('https://api.apitube.io/v1/news/everything?language.code=en&category.id=medtop:20000170&api_key='.$newskey);


        if ($response->failed()) {
            $errorMessage = $response->clientError()
                ? "Client Error: " . $response->status()
                : "Server Error: " . $response->status();

            return view('busines', ['error' => $errorMessage]);
        }

        $newsData = $response->json();

        return view('busines', ['news' => $newsData]);
    }
}
