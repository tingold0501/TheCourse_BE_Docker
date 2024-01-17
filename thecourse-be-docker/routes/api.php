<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(UserController::class)->group(function () {
    Route::get('/getDataUser', 'index');
    Route::post('/addNewUser', 'create');
});
Route::controller(RoleController::class)->group(function () {
    Route::get('/getDataRole', 'index');
    Route::post('/addRole', 'create');
});
