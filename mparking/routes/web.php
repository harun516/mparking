<?php

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
    return view('index');
})->middleware([]);

Route::get('/test', function () {
    return 'Test Route';
})->middleware('bypassAuth');

// Route::get('/nimda', [KendaraanController::class, 'index'])->name('dashboard.index')->middleware([]);

Route::namespace('App\Http\Controllers')->group(function () {
Route::get('/nimda', 'Controller@index')->name('dashboard.index');

// user
Route::get('/user', 'UserController@index')->name('user.index');
// Route::post('/user/store', 'UserController@store')->name('user.store');
Route::get('/user/get', 'UserController@get')->name('user.get');
Route::get('/user/show/{id}', 'UserController@show')->name('user.show');
Route::post('/user/simpan', 'UserController@simpan')->name('user.simpan');
Route::delete('/user/hapus/{id}', 'UserController@destroy')->name('user.destroy');


// role
Route::get('/role', 'RoleController@index')->name('role.index');
// Route::post('/role/store', 'RoleController@store')->name('role.store');
Route::get('/role/get', 'RoleController@get')->name('role.get');
Route::get('/role/show/{id}', 'RoleController@show')->name('role.show');
Route::post('/role/simpan', 'RoleController@simpan')->name('role.simpan');
Route::delete('/role/hapus/{id}', 'RoleController@destroy')->name('role.destroy');

Route::get('/mobil', 'MobilController@index')->name('mobil.index');
Route::post('/mobil/store', 'MobilController@store')->name('mobil.store');

Route::get('/pengantaran', 'PengantaranController@index')->name('pengantaran.index');
Route::post('/pengantaran/store', 'PengantaranController@store')->name('pengantaran.store');

Route::get('/transporter', 'TransporterController@index')->name('transporter.index');
Route::post('/transporter/store', 'TransporterController@store')->name('transporter.store');

});


