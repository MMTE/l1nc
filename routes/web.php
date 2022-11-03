<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    $url = 'google.com';
    return (new \App\Repositories\DomainRepository())->parsUrl($url);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/domains', function () {
        return view('domains');
    })->name('domains');
});


Route::get('{url}', function ($url) {

    $domain = request()->get('domain');
    $domain_id = $domain ? $domain->id : null;

    $link = \App\Models\Link::where('url', $url)->where('domain_id', $domain_id)->first();

    if ($link) {
        return redirect()->away($link->original);
    } else {
        // not found
        return 'link not found';
    }

})->middleware(['domain']);

