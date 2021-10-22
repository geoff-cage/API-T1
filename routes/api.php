<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ThemeController;
use App\Http\Controllers\AuthController;

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
//grouped routes
//Route::resource('themes', ThemeController::class);

//public routes
Route::get('/themes', [ThemeController::class, 'index']);
Route::get('/themes/{id}', [ThemeController::class, 'show']);
Route::get('/themes/search/{name}', [ThemeController::class, 'search']);
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);



//

//protected routes
Route::group(['middleware' =>['auth:sanctum']], function () {

Route::post('/themes', [ThemeController::class,'store']);
Route::put('/themes/{id}', [ThemeController::class,'update']);
Route::delete('/themes/{id}', [ThemeController::class,'destroy']);
Route::post('/logout', [AuthController::class,'logout']);
   
});
