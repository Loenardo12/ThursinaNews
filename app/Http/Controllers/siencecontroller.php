<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class siencecontroller extends Controller
{
    public function sience(Request $request)
    {
        $url = "https://api.apitube.io/v1/news/everything?category.name=sience&api_key=api_live_ew3bRhaMn6N9SEqva3ZAxZISQw0WlAZvYOPQxlJhTxQA3SWyxI9fXG6oG3Yz";

        $response = Http::get($url);

        if ($response->failed()) {
            $errorMessage = $response->clientError()
                ? "Client Error: " . $response->status()
                : "Server Error: " . $response->status();

            return view('sience', ['error' => $errorMessage]);
        }

        $newsData = $response->json();

        return view('sience', ['news' => $newsData]);
    }
}
