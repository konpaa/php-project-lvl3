<?php

use App\Http\Controllers\UrlsCheckController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UrlsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/domains', [UrlsController::class,'index'])
    ->name('domains.index');

Route::post('/domains', [UrlsController::class,'store'])
    ->name('domains.store');

Route::get('/domains/{id}', [UrlsController::class,'show'])
    ->name('domains.show');

Route::post('/domains/{id}/checks', [UrlsCheckController::class,'store'])
    ->name('domains.checks.store');




