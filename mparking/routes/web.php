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

//kendaraan
Route::get('/kendaraan', 'KendaraanController@index')->name('kendaraan.index');
Route::get('/kendaraan/get', 'KendaraanController@get')->name('kendaraan.get');
Route::get('/kendaraan/show/{id}', 'KendaraanController@show')->name('kendaraan.show');
Route::post('/kendaraan/simpan', 'KendaraanController@simpan')->name('kendaraan.simpan');
Route::get('/kendaraan/cetak/{id}', 'KendaraanController@cetakBarcode')->name('kendaraan.cetak');
Route::get('/kendaraan/validate/{id}', 'KendaraanController@validateUserId')->name('kendaraan.validate');
Route::delete('/kendaraan/hapus/{id}', 'KendaraanController@destroy')->name('kendaraan.destroy');


//Inbound - registrasi
Route::get('/registrasimobil', 'InboundController@indexRegistrasi')->name('registrasimobil.index');
Route::post('/registrasimobil/simpan', 'InboundController@simpanRegistrasi')->name('registrasimobil.simpan');
Route::get('/registrasimobil/mobilbarcode/{barcode}', 'InboundController@mobilBarcode')->name('mobilbarcode.show');

//inbound - get kode parkir
Route::get('/kodeparkir/{kodeparkir}', 'InboundController@kodeparkir')->name('kodeparkir.show');

//Inbound - start unloading
Route::get('/startunloading', 'InboundController@indexStartUnloading')->name('startunloading.index');
Route::post('/startunloading/simpan', 'InboundController@simpanStartUnloading')->name('startunloading.simpan');

//Inbound - finish unloading
Route::get('/finishunloading', 'InboundController@indexFinishUnloading')->name('finishunloading.index');
Route::post('/finishunloading/simpan', 'InboundController@simpanFinishUnloading')->name('finishunloading.simpan');

//Inbound - document finish
Route::get('/documentfinish', 'InboundController@indexDocumentFinish')->name('documentfinish.index');
Route::post('/documentfinish/simpan', 'InboundController@simpanDocumentFinish')->name('documentfinish.simpan');


//outbound - registrasi
Route::get('/registrasimobilout', 'OutboundController@indexRegistrasi')->name('registrasimobilout.index');
Route::post('/registrasimobilout/simpan', 'OutboundController@simpanRegistrasi')->name('registrasimobilout.simpan');
Route::get('/registrasimobilout/mobilbarcode/{barcode}', 'OutboundController@mobilBarcode')->name('mobilbarcodeout.show');

//outbound - get kode parkir
Route::get('/kodeparkirout/{kodeparkir}', 'OutboundController@kodeparkir')->name('kodeparkirout.show');

//outbound - start document
Route::get('/startdocumentout', 'OutboundController@indexStartDocument')->name('startdocumentout.index');
Route::post('/startdocumentout/simpan', 'OutboundController@simpanStartDocument')->name('startdocumentout.simpan');

//outbound - start picking process
Route::get('/startpickingprocess', 'OutboundController@indexStartPickingProcess')->name('startpickingprocess.index');
Route::post('/startpickingprocess/simpan', 'OutboundController@simpanStartPickingProcess')->name('startpickingprocess.simpan');

//outbound - start loading
Route::get('/startloading', 'OutboundController@indexStartLoading')->name('startloading.index');
Route::post('/startloading/simpan', 'OutboundController@simpanStartLoading')->name('startloading.simpan');

//outbound - finish loading
Route::get('/finishloading', 'OutboundController@indexFinishLoading')->name('finishloading.index');
Route::post('/finishloading/simpan', 'OutboundController@simpanFinishLoading')->name('finishloading.simpan');

//outbound - document finish
Route::get('/documentfinishout', 'OutboundController@indexDocumentFinishOut')->name('documentfinishout.index');
Route::post('/documentfinishout/simpan', 'OutboundController@simpanDocumentFinishOut')->name('documentfinishout.simpan');


//checkout - get kode parkir
Route::get('/kodeparkircheckout/{kodeparkir}', 'CheckoutController@kodeparkir')->name('kodeparkircheckout.show');

//checkout - checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout/simpan', 'CheckoutController@simpanCheckout')->name('checkout.simpan');
});


