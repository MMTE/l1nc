<?php

use App\Models\Link;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
//
//     $link = Link::first();
//     return $link->getLinkUrl();
//    return Link::latest()->with('domain')->first();
//    $url = 'google.com';
//    return (new \App\Repositories\DomainRepository())->parsUrl($url);
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
    Route::get('/links/{link}', function (Link $link) {
        return view('link')->with(compact('link'));
    })->name('links.show');
});

Route::get('/custom-domain/verify', function () {

    $secret = request()->get('secret');

    $domain_value = Cache::get($secret);

    if (!$domain_value) {
        return 'verification time expired. please try again';
    }

    $v_domain_id = explode('_', $domain_value)[1];

    $domain = request()->get('domain');

    if ($domain->id == $v_domain_id) {
        $domain->is_verified = true;
        $domain->save();
    }

    return 'domain verified successfully';

})->middleware(['domain']);


Route::get('{url}', function ($url) {

    $domain = request()->get('domain');

    $domain_id = $domain ? $domain->id : null;

    $link = Link::where('url', $url)->where('domain_id', $domain_id);

    if ($l = $link->first()) {
        $link->increment('clicks');
        return redirect()->away($l->destination);
    } else {
        // not found
        return 'link not found';
    }

})->middleware(['domain']);

