<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class internationalcontroller extends Controller
{
    public function international(Request $request)
    {
        $url = "https://api.apitube.io/v1/news/everything?category.name=world&api_key=api_live_ew3bRhaMn6N9SEqva3ZAxZISQw0WlAZvYOPQxlJhTxQA3SWyxI9fXG6oG3Yz";

        $response = Http::get($url);

        if ($response->failed()) {
            $errorMessage = $response->clientError()
                ? "Client Error: " . $response->status()
                : "Server Error: " . $response->status();

            return view('international', ['error' => $errorMessage]);
        }

        $newsData = $response->json();

        return view('international', ['news' => $newsData]);
    }
}
