<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return \App\Models\Link::all();
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('{url}', function ($url) {
    $link = \App\Models\Link::where('url', $url)->first();

    if ($link) {
        return redirect()->away($link->original);
    } else {
        // not found
    }
});

