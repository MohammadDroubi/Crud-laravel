<?php

use App\Http\Controllers\CatController;
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

Route::get('/create',[CatController::class,'create']);
Route::post('/store',[CatController::class,'store']);
Route::get('/display',[CatController::class,'display']);
Route::get('/delete/{id}',[CatController::class,'delete']);
Route::get('/edit/{id}',[CatController::class,'edit']);
Route::put('/update/{id}',[CatController::class,'update']);
