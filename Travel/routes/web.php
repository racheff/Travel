<?php
use Illuminate\Http\Request;
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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('destinations', 'DestinationsController');
Route::resource('agents', 'AgentsController');
Route::resource('bookings', 'BookingsController');
Route::resource('payments', 'PaymentsController');
Route::get('/bookings/create/{id}', 'BookingsController@create');
Route::get('/payments/create/{id}', 'PaymentsController@create');
Route::get('destinations/search/{name}', function ($name) {
    $destinations = App\Destinations::search($name)->get();
    if($destinations->isNotEmpty()){
        return view('Destinations.index')->with('destinations', $destinations);
    }else{
        return redirect('destinations')->with('message', 'No Results Found');
    }

});