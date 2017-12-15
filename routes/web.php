<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'SiteController@index')->name('site');

Route::get('/site', 'SiteController@index')->name('site');
Route::get('/site/data', 'SiteController@index_data')->name('site.data');
Route::get('/site/detail/{id}','SiteController@show');
Route::get('/site/export/{id}', 'SiteController@export')->name('site.export');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/data', 'DashboardController@data')->name('dashboard.data');


Route::get('sales_order/detail/{id}','SalesOrderController@show');

