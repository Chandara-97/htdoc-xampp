<?php

use App\Http\Controllers\ArticlesController;
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

////list articles
//Route::get('/articles','ArticlesController@index');
////List attribute with single article
//Route::get('/articles/{id}','ArticlesController@singleArticle');
////Create New article
//Route::post('articles','ArticlesController@store');
////Update article
//Route::put('articles/{id}','ArticlesController@store');
////Delete Article
//Route::delete('articles/{id}','ArticlesController@destroy');

Route::group(['prefix' => 'articles'], function(){
    Route::get("/",[ArticlesController::class,'index']);
    Route::get("/{id}",[ArticlesController::class,'singleArticle']);
    Route::post("/", [ArticlesController::class, 'store']);
    Route::put("/", [ArticlesController::class, 'store']);
    Route::delete("/{id}",[ArticlesController::class,"destroy"]);
});

