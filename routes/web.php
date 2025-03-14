<?php

use App\Http\Controllers\businesscontroller;
use App\Http\Controllers\entertaincontroller;
use App\Http\Controllers\healthcontroller;
use App\Http\Controllers\internationalcontroller;
use App\Http\Controllers\islamiccontroller;
use App\Http\Controllers\localcontroller;
use App\Http\Controllers\politiccontroller;
use App\Http\Controllers\searchcontroller;
use App\Http\Controllers\sportcontroller;
use App\Http\Controllers\technologycontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newscontroller;
use App\Http\Controllers\newsapitube;
use App\Http\Controllers\siencecontroller;

Route::get('/', [newsapitube::class, 'makeRequest'])->name('news.index');
Route::get('/search', [SearchController::class, 'search'])->name('news.search');
Route::get('/news/platform', [NewsController::class, 'platform'])->name('news.platform');


Route::get('/news/entertain', [entertaincontroller::class, 'entertain'])->name('news.entertain');
Route::get('/news/health', [healthcontroller::class, 'health'])->name('news.health');
Route::get('/news/science', [siencecontroller::class, 'science'])->name('news.science');
Route::get('/news/sports', [sportcontroller::class, 'sports'])->name('news.sports');
Route::get('/news/tech', [technologycontroller::class, 'tech'])->name('news.tech');
Route::get('/news/business', [businesscontroller::class, 'business'])->name('news.business');
Route::get('/news/islamic', [islamiccontroller::class, 'islamic'])->name('news.islamic');
Route::get('/news/politics', [politiccontroller::class, 'politics'])->name('news.politics');
Route::get('/news/international', [internationalcontroller::class, 'international'])->name('news.international');
Route::get('/news/local', [localcontroller::class, 'local'])->name('news.local');

Route::get('/details', function () {
    return view('details');
});

Route::get('/search', function () {
    return view('searchPage');
});

