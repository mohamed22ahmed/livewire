<?php

use App\Http\Controllers\ProductController;
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


Route::get('/search',[SearchController::class, 'index'])->name('index');
Route::get('/get_results',[SearchController::class, 'get_results'])->name('get_results');
Route::get('/clear_previous_search', [SearchController::class, 'clear_previous_search'])->name('clear_previous_search');

Route::get('/book/{isbn13}/{slug}/{condition?}', [ProductController::class, 'show'])->name('product.show');
