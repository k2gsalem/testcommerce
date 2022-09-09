<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\UserController;
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
Route::post('user',[UserController::class,'store']);
Route::post('login',[UserController::class,'login']);
Route::apiResource('category',CategoryController::class);
Route::apiResource('item',ItemController::class);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('user',UserController::class)->except('store');
});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
