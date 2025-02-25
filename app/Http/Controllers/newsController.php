<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class newsController extends Controller
{
     public function index()
    {
        $newskey=env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines?country=us&apiKey='.$newskey);
        $news = $response->json();
        $newsdata = $news['articles'];
        return view('/news',compact('newsdata'));
    }
}
