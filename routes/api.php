<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(KaryawanController::class)->group(function(){
    Route::post('/delete', 'remove')->name('delete');
    Route::post('/getById', 'details')->name('getById');
    Route::post('/saved', 'saved')->name('saved');
    Route::post('/getAll', 'getAllData')->name('getAll');
});