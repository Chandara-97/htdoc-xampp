<?php

use App\Http\Controllers\ItemController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'items'], function(){
    Route::post('', [ItemController::class, 'store']);
    Route::get('', [ItemController::class, 'index']);
    Route::get('/all', [ItemController::class, 'listAll']);
    Route::get('/{id}', [ItemController::class, 'show']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::patch('/{id}', [ItemController::class, 'updateStatus']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});

