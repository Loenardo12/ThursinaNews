<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use jcobhams\NewsApi\NewsApi;

class newsController extends Controller
{
     public function index()
    {
        $newskey=env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines?country=us&apiKey='.$newskey);
        $news = $response->json();
        $newsdata = $news['articles'];
        return view('index',compact('newsdata'));



    }
}
        // $newsapi =env('NEWS_API_KEY');
        // $newsapi = new NewsApi('https://newsapi.org/v2/top-headlines?country=us&apiKey='.$newskey);

        // # /v2/everything
        // $all_articles = $newsapi->getEverything($q, $sources, $domains, $exclude_domains, $from, $to, $language, $sort_by,  $page_size, $page);
        // # /v2/top-headlines
        // $top_headlines = $newsapi->getTopHeadlines($q, $sources, $country, $category, $page_size, $page);
        // # /v2/top-headlines/sources
        // $sources = $newsapi->getSources($category, $language, $country);
