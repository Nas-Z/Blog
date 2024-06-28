<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\signupController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PostController;


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
//push
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// register 
Route::post('/user/signup', [signupController::class, 'register']);

//login
Route::post('/user/login', [LoginController::class, 'loginUser']);

//index
Route::get('/posts', [PostController::class, 'index']);

