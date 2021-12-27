<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/allNews{order?}/{line?}/{this_page?}', 'App\Http\Controllers\NewsController@index')->name('index');

//Route::resource('/posts', NewsController::class);
Route::get('/firstThreeNews', 'App\Http\Controllers\NewsController@firstThreeNews');

Route::get('/sortByTitleAsc', 'App\Http\Controllers\NewsController@sortByTitleAsc');
Route::get('/sortByTitleDesc', 'App\Http\Controllers\NewsController@sortByTitleDesc');

Route::get('/sortByDateAsc', 'App\Http\Controllers\NewsController@sortByDateAsc');
Route::get('/sortByDateDesc', 'App\Http\Controllers\NewsController@sortByDateDesc');

Route::get('/news/{slug}', 'App\Http\Controllers\NewsController@showOneNews')->name('showOneNews');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
