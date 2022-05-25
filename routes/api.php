<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LockerController;
use App\Http\Controllers\RecordController;
use App\Http\Middleware\UnlockMiddleware;
use App\Http\Middleware\EnsurePermissionIsRoot;

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
Route::get('logout',[UserController::class,'logout']);

Route::middleware([EnsurePermissionIsRoot::class])->group(function () {
    Route::patch('user/{lockerNo}',[UserController::class,'update']);
    Route::post('user',[UserController::class,'store']);

    Route::get('locker',[LockerController::class,'index']);
    Route::post('unlock',[LockerController::class,'unlock']);

    Route::get('record/{lockerNo}',[RecordController::class,'show']);
});

Route::post('RPIunlock',[LockerController::class,'RPIunlock'])->middleware(UnlockMiddleware::class);

