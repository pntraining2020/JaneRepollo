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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ClockController@showClock');
Route::post('/clockin', 'ClockController@clockin')->name('clockin');
Route::post('/clockout', 'ClockController@clockout')->name('clockout');
Route::post('/start_break', 'ClockController@startBreak')->name('start_break');
Route::post('/end_break', 'ClockController@endBreak')->name('end_break');