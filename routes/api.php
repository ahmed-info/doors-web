<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlideApiController;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\SubcategoryApiController;
use App\Http\Controllers\ProductApiController;
use App\Http\Controllers\SocialmediaApiController;
use App\Http\Controllers\CustomerApiController;
use App\Http\Controllers\FavoriteApiController;
use App\Http\Controllers\CartApiController;
use App\Http\Controllers\OrderApiController;
use App\Models\User;

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

Route::get('/slides',[SlideApiController::class,'index']);

Route::post('register',[AuthApiController::class,'register']);

Route::post('login',[AuthApiController::class,'login']);
Route::group(['middleware'=>['auth:sanctum']], function(){

    Route::post('logout',[AuthApiController::class,'logout']);
});

Route::get('allFavorite/{userId}',[FavoriteApiController::class,'allFavorite']);
Route::get('favorite/{userId}',[FavoriteApiController::class,'favorite']);
Route::post('addFavorite',[FavoriteApiController::class,'addFavorite']);
Route::delete('removeFavorite/{prodID}/{userid}',[FavoriteApiController::class,'removeFavorite']);
Route::delete('deleteMyFavorite/{id}',[FavoriteApiController::class,'deleteMyFavorite']);

Route::get('allCart/{userId}',[CartApiController::class,'allCart']);
Route::post('cart/store',[CartApiController::class,'store']);
Route::delete('removeCart/{prodID}/{userid}',[CartApiController::class,'removeCart']);
Route::get('getCountProduct/{prodID}/{userid}',[CartApiController::class,'getCountProduct']);
Route::get('cartView/{userid}',[CartApiController::class,'cartView']);

Route::post('order/store',[OrderApiController::class,'store']);


Route::get('/catsSubsSlides',[CategoryApiController::class,'index']);
Route::get('/subcategories',[SubcategoryApiController::class,'index']);
Route::get('/subcategories/{id}',[SubcategoryApiController::class,'getSubcategories']);
Route::get('/categorySubcategory',[SubcategoryApiController::class,'getCategorySubcategory']);
// Route::get('productUnFavGuest',[ProductApiController::class,'index']);
Route::get('products/{subID?}/{userid?}',[ProductApiController::class,'show']);
Route::get('allproducts',[ProductApiController::class,'allproducts']);
Route::get('search/{search}',[ProductApiController::class,'search']);
Route::get('/socialmedia',[SocialmediaApiController::class,'index']);

Route::get('/users', function (Request $request) {
    return User::all();
});
