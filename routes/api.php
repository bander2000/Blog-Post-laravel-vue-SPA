<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogCommentController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CatogryBlogsController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\LandingPageController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/athenticated', function () {
    return true;
});

Route::get('/blogs',[LandingPageController::class,'index']);
Route::apiResource('/blog',BlogController::class);
Route::get('/blog/{id}/edit',[BlogController::class,'edit']);
Route::post('/blog/{id}/comment',[BlogCommentController::class,'store']);
Route::get('/catogry/{id}/blogs',[CatogryBlogsController::class,'show']);
Route::get('/catogries',[CatogryBlogsController::class,'index']);
Route::get('/dashboard',[DashboardController::class,'index']);

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout']);

