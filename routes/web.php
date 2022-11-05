<?php

use App\Models\Link;
use App\Models\View;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Features;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {


    $view = View::latest()->first();
    return json_decode($view->ip_details)->geoplugin_countryName;
    return json_decode($view->ip_details)->geoplugin_countryName;


//    return file_get_contents("https://www.geoplugin.com/ip.php");

    $ip = request()->ip();

//    $headers = [
//        'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
//    ];
//
//    $agent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36';

    $request = Http::get('http://www.geoplugin.net/json.gp?ip=' . '223.12.1.53');

    return $request->json();

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

        $views = View::where('link_id', $link->id)
            ->where('created_at', '>', now()->subDays(30)->endOfDay())
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('Y M d D');
            });


        $columnChartModel = $views
            ->reduce(function ($columnChartModel, $data, $day) {

                $date = $day;
                $value = $data->count();

                return $columnChartModel->addColumn($date, $value, '#4062BB');
            },
                LivewireCharts::columnChartModel()
                    ->setTitle('views in past 30 days')
                    ->setColumnWidth(20)
                    ->stacked()
//                    ->setDataLabelsEnabled(true)
//                    ->withDataLabels(true)
//                    ->withLegend(true)
            );

//
//        $columnChartModel =
//            (new ColumnChartModel())
//                ->setTitle('Views Past 30 days')
//                ->addColumn('Food', 100, '#f6ad55')
//                ->addColumn('Shopping', 200, '#fc8181')
//                ->addColumn('Travel', 300, '#90cdf4');


        return view('link')->with(compact('link', 'columnChartModel'));
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

    if (!($link_instance = $link->first())) {
        return 'link not found';
    }

    // todo: move this to queue
    // $ip = request()->ip();
    // for testing
    $ip = long2ip(mt_rand());
    $geoIpResponse = Http::get('http://www.geoplugin.net/json.gp?ip=' . $ip)->json();

    // save view ip details
    $view = new View();
    $view->link_id = $link_instance->id;
    $view->ip_details = json_encode($geoIpResponse);
    $view->save();

    $link->increment('clicks');
    return redirect()->away($link_instance->destination);

})->middleware(['domain']);

