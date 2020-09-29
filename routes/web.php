<?php

use App\Religion;
use Illuminate\Support\Facades\Route;

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

Route::get('/registrations/approve/{id}', 'RegistrationController@approve')->name('registrations.approve');
Route::get('/registrations/reject/{id}', 'RegistrationController@reject')->name('registrations.reject');

Route::resource('/registrations', 'RegistrationController');
