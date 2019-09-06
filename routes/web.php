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
//    return view('dashboard');
//});
//

//Route::get('/', function () {
//    return view('welcome');
//});


//
//Route::get('/', function () {
//    return view('welcome');
//});

//dashboard
Route::get('/','frontendController@dashboard')->name('dashboard');


//table
Route::get('/tables','frontendController@tables')->name('tables');
//Route::get('/','frontendController@showTables')->name('tables');

Route::get('/test','frontendController@getAge');

//Route::get('/test1','frontendController@getJobCategory');

Route::get('/experience','frontendController@getExperience');


Route::get('/test1/{id}','frontendController@getTitle')->name('test');


//for chart.blade.php
//Route::get('/', 'frontendController@Chartjs')->name('dashboard');

//for get method to load on ajax
//Route::get('/getGender','frontendController@getGender');


//Route::get("/chart", "frontendController@Chartjs")->name('chart');

