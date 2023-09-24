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
Route::get('/role/get', 'RoleController@get')->name('role.get');
Route::get('/role/show/{id}', 'RoleController@show')->name('role.show');
Route::post('/role/simpan', 'RoleController@simpan')->name('role.simpan');
Route::delete('/role/hapus/{id}', 'RoleController@destroy')->name('role.destroy');

// mobil
Route::get('/mobil', 'MobilController@index')->name('mobil.index');
Route::get('/mobil/get', 'MobilController@get')->name('mobil.get');
Route::get('/mobil/show/{id}', 'MobilController@show')->name('mobil.show');
Route::post('/mobil/simpan', 'MobilController@simpan')->name('mobil.simpan');
Route::delete('/mobil/hapus/{id}', 'MobilController@destroy')->name('mobil.destroy');

// pengantaran
Route::get('/pengantaran', 'PengantaranController@index')->name('pengantaran.index');
Route::get('/pengantaran/get', 'PengantaranController@get')->name('pengantaran.get');
Route::get('/pengantaran/show/{id}', 'PengantaranController@show')->name('pengantaran.show');
Route::post('/pengantaran/simpan', 'PengantaranController@simpan')->name('pengantaran.simpan');
Route::delete('/pengantaran/hapus/{id}', 'PengantaranController@destroy')->name('pengantaran.destroy');

// transporter
Route::get('/transporter', 'TransporterController@index')->name('transporter.index');
Route::get('/transporter/get', 'TransporterController@get')->name('transporter.get');
Route::get('/transporter/show/{id}', 'TransporterController@show')->name('transporter.show');
Route::post('/transporter/simpan', 'TransporterController@simpan')->name('transporter.simpan');
Route::delete('/transporter/hapus/{id}', 'TransporterController@destroy')->name('transporter.destroy');

});


