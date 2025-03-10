<?php

use App\Http\Controllers\searchcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newscontroller;
use App\Http\Controllers\newsapitube;
// Route::get('/', function () {
//        return redirect('/news');
// });

// Route::get('/news',[newsController::class,'us'])->name('us');
// Route::get('/news/platform', [NewsController::class, 'platform'])->name('news.platform');
// Route::get('/news/entertain', [NewsController::class, 'entertain'])->name('news.entertain');
// Route::get('/news/health', [NewsController::class, 'health'])->name('news.health');
// Route::get('/news/science', [NewsController::class, 'science'])->name('news.science');
// Route::get('/news/sports', [NewsController::class, 'sports'])->name('news.sports');
// Route::get('/news/tech', [NewsController::class, 'tech'])->name('news.tech');
// Route::get('/news/business', [NewsController::class, 'business'])->name('news.business');
// Route::get('/news/general', [NewsController::class, 'general'])->name('news.general');



Route::get('/', [newsapitube::class, 'makeRequest'])->name('news.index');
Route::get('/search', [SearchController::class, 'search'])->name('news.search');

Route::get('/author', function () {
    return view('author');
});


Route::get('/author', function () {
    return view('author');
});

Route::get('/category', function () {
    return view('categoryPage');
});

Route::get('/details', function () {
    return view('details');
});

Route::get('/search', function () {
    return view('searchPage');
});
