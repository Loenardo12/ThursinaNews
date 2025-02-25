<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newscontroller;
// Route::get('/', function () {
//     // return view('welcome');
//     return redirect('/news');
// });

// Route::get('/news',[newsController::class,'index'])->name('index');

Route::get('/', function () {
    return view('index');
});

