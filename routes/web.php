<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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


Route::get('/search', function () {
    return View::make('pages.search');
});
Route::get('/suggest', [SearchController::class, "suggestedWords"])->name('suggestedWords');

Route::get('/get_results', [SearchController::class, 'get_results'])->name('get_results');
Route::get('/clear_previous_search', [SearchController::class, 'clear_previous_search'])->name('clear_previous_search');
