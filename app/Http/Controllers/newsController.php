<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use jcobhams\NewsApi\NewsApi;

class newsController extends Controller
{
     public function us()
    {
        $newskey= env ('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines?country=us&apiKey='.$newskey);
        $news = $response->json();
        $newsdata = $news['articles'];
        return view('index',compact('newsdata'));
    }


     public function platform()
    {
        $newskey= env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines/sources?apiKey='.$newskey);
        $plat = $response->json();
        $newsplat = $plat ['sources'];
        return view('index',compact('newsplat'));
    }

    public function search(Request $request)
    {
        $newskey=env('NEWS_API_KEY');
        $search = $request->search;
        $response = Http::get('https://newsapi.org/v2/everything?q='.$search.'&apiKey='.$newskey);
        $search = $response->json();
        $searchdata = $search ['articles'];
        return view('index',compact('searchdata'));

    }

    public function entertain()
    {
        $newskey=env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines/sources?apiKey='.$newskey);
        $enter = $response->json();
        $newsenter = $enter ['sources'];
        return view('index',compact('newsenter'));

    }

    public function health()
    {
        $newskey=env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines/sources?apiKey='.$newskey);
        $health = $response->json();
        $newshealth = $health ['sources'];
        return view('index',compact('newshealth'));

    }

    public function science()
    {
        $newskey=env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines/sources?apiKey='.$newskey);
        $science = $response->json();
        $newsscience = $science ['sources'];
        return view('index',compact('newsscience'));

    }

    public function sports()
    {
        $newskey=env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines/sources?apiKey='.$newskey);
        $sports = $response->json();
        $newssports = $sports ['sources'];
        return view('index',compact('newssports'));

    }

    public function tech()
    {
        $newskey=env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines/sources?apiKey='.$newskey);
        $tech = $response->json();
        $newstech = $tech ['sources'];
        return view('index',compact('newstech'));

    }
    public function business()
    {
        $newskey=env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines/sources?apiKey='.$newskey);
        $business = $response->json();
        $newsbusiness = $business ['sources'];
        return view('index',compact('newsbusiness'));

    }
    public function general()
    {
        $newskey=env('NEWS_API_KEY');
        $response = Http::get('https://newsapi.org/v2/top-headlines/sources?apiKey='.$newskey);
        $general = $response->json();
        $newsgeneral = $general ['sources'];
        return view('index',compact('newsgeneral'));

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
