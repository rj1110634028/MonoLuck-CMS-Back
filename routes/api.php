<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LockerController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login',[UserController::class,'login']);
Route::post('update',[UserController::class,'update']);
Route::get('register',[UserController::class,'register']);

Route::post('lockup',[LockerController::class,'lockup']);
Route::post('locker',[LockerController::class,'locker'])->middleware('verified')->name('verification.notice');