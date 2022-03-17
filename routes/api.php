<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
 use App\Http\Controllers\EventController;
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

Route::middleware('auth:api')->post('/update', [UserController::class, 'updateUser']);

Route::get('user', [UserController::class, 'getUser']);
Route::get('user/{id}', [UserController::class, 'getUserId']);
Route::post('create', [UserController::class, 'createUser']);

Route::post('login', [UserController::class, 'login']);

// Post Controller
Route::get('post', [PostController::class, 'getPost']);
Route::post('storepost', [PostController::class, 'storePost']);
Route::get('post/{id}', [PostController::class, 'getPostId']);

// Event Controller
Route::get('event', [EventController::class, 'getEvent']);
Route::get('event/{id}', [EventController::class, 'getEventId']);
Route::post('eventcreate', [EventController::class, 'createEvent']);

