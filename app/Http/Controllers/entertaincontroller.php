<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class entertaincontroller extends Controller
{
    public function entertain(Request $request)
    {
        $url = "https://api.apitube.io/v1/news/everything?category.name=arts_and_entertainment&api_key=api_live_ew3bRhaMn6N9SEqva3ZAxZISQw0WlAZvYOPQxlJhTxQA3SWyxI9fXG6oG3Yz";

        $response = Http::get($url);

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
