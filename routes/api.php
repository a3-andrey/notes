<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::post('register', [RegisteredUserController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::resource('notes',\App\Http\Controllers\Dashboard\Api\NoteController::class);
//    Route::name('notes')->prefix('notes')->group(function (){
//        Route::resource('index',[\App\Http\Controllers\Dashboard\Api\NoteController::class,'index'])->name('index');
//    });
});

