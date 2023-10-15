<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PassowrController;
use App\Http\Controllers\Api\RsaController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['prefix' => 'auth'], function () {
    Route::post("/register", [AuthController::class, 'register']);
    Route::post("/login", [AuthController::class, 'login']);
    Route::post("/logout", [AuthController::class, 'logout']);
});

Route::group(['prefix' => 'password'], function () {
    Route::post("/register", [PassowrController::class, 'register']);

})->middleware("jwt.verify");

// Route::group(['prefix' => 'rsa'], function () {
//     Route::get("/generate", [RsaController::class, 'generate']);

// });
