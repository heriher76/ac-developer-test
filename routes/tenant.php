<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Stancl\Tenancy\Contracts\Tenant;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/
Route::namespace('App\\Http\\Controllers\\')->middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    Route::group(['prefix' => '{locale}/', 'middleware' => 'localization'], function() {
        Route::get('/impersonate/{token}', 'ImpersonateController@store');

        Route::get('/home', 'HomeController@index')->name('home');
    });

});

Route::namespace('App\\Http\\Controllers\\')->middleware([
    'web',
    'universal', 
    'localization',
])->prefix('{locale}/')->group(function () {
    Auth::routes();
});