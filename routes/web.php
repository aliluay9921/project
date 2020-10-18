<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middlware' => 'auth:admin'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/loginadmin', [App\Http\Controllers\HomeController::class, 'loginadmin']);
    Route::get('/admin', [App\Http\Controllers\adminController::class, 'index'])->name('getadmin');
});
Route::group(['middleware' => 'auth'], function () {
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/countary',[App\Http\Controllers\countaryController::class, 'getcountary'])->name('countary');
Route::post('add',[App\Http\Controllers\countaryController::class, 'addcountary'])->name('add.countary');
Route::get('/getusercountary',[App\Http\Controllers\countaryController::class, 'getusercountary'])->name('getusercountary');

Route::get('/profiluser',[App\Http\Controllers\countaryController::class, 'profil'])->name('profil');
Route::post('add_info',[App\Http\Controllers\countaryController::class, 'addinfo'])->name('add.info');
Route::get('/wherehas',[App\Http\Controllers\countaryController::class, 'wherehas']);
Route::get('/getaddres',[App\Http\Controllers\countaryController::class, 'getaddres']);
Route::get('/wherehasonly',[App\Http\Controllers\countaryController::class, 'wherehasonly']);


Route::get('/test',[App\Http\Controllers\countaryController::class, 'test']);

Route::get('/corona',[App\Http\Controllers\coronaController::class, 'index']);
Route::get('multiimage',[App\Http\Controllers\testController::class, 'index']);
Route::post('store/multiimage',[App\Http\Controllers\testController::class, 'store'])->name('image.upload');





