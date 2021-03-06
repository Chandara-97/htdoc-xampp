<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('post',function () {
    return view('test.hello');
});

Route::group(['prefix' => 'articles'], function(){
    Route::get("/",[ArticlesController::class,'index']);
    Route::get("/{id}",[ArticlesController::class,'singleArticle']);
    Route::post("/", [ArticlesController::class, 'store']);
    Route::put("/", [ArticlesController::class, 'store']);
    Route::delete("/{id}",[ArticlesController::class,"destroy"]);
});
