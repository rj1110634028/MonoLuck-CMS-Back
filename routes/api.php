<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LockerController;
use App\Http\Controllers\RecordController;
use App\Http\Middleware\EnsurePermissionIsLVL1;
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
Route::patch('user/{id}',[UserController::class,'update'])->middleware(EnsurePermissionIsRoot::class);
Route::post('user',[UserController::class,'store'])->middleware(EnsurePermissionIsRoot::class);

Route::post('unlock',[LockerController::class,'unlock'])->middleware(EnsurePermissionIsLVL1::class);
Route::get('locker',[LockerController::class,'index'])->middleware(EnsurePermissionIsRoot::class);

Route::get('record/{lockerNo}',[RecordController::class,'show'])->middleware(EnsurePermissionIsRoot::class);



Route::get('register',[UserController::class,'register']);
