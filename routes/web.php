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

// use Illuminate\Support\Facades\Route;

Route::get('/Adminpanel', 'Auth\LoginController@showLoginForm')->name('Adminpanel');
Route::get('/akses', function () {
    return redirect('Adminpanel');
});


Route::group(['middleware' => ['auth']], function () {
    Route::resource('dashboard', 'Dashboard');
    Route::get('logout', 'Dashboard@logout');
});


Auth::routes();
Route::get('/', 'Home@index')->name('/')->middleware('guest');
// Route::get('/{id}', 'Home@index')->name('/')->middleware('guest');
Route::get('/listdata', 'Home@listdata')->name('listdata');
