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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('destinations', function()
{
    return View::make('Destinations.index');
});
Route::get('tagents', function()
{
    return View::make('TAgents.index');
});
Route::get('packs', function()
{
    return View::make('pages.packs');
});