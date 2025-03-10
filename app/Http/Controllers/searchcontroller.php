<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class searchcontroller extends Controller
{
    public function search(Request $request)
    {
        $newsKey = env('NEWS_API_KEY'); // Ambil API Key dari .env
        $search = $request->query('search');

        if (!$search) {
            return redirect()->back()->with('error', 'Masukkan kata kunci pencarian.');
        }

        $response = Http::get("https://api.apitube.io/v1/news/everything", [
            'q' => "title:$search",
            'api_key' => $newsKey
        ]);

        $data = $response->json();

        // Periksa apakah data tersedia
        $searchData = $data['data'] ?? [];

        return view('searchPage', compact('searchData', 'search'));
    }
}
