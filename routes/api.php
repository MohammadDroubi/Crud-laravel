<?php

use App\Http\Controllers\API\CatController;
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


Route::get('cat/all',[CatController::class,'all']);
Route::get('cat/show/{id}',[CatController::class,'show']);
Route::post('cat/create',[CatController::class,'create']);
Route::put('cat/update/{id}',[CatController::class,'update']);
Route::delete('cat/delete/{id}',[CatController::class,'destory']);

