<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SocialmediaController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ContactController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'index'])->name('mainHome');
Route::get('aboutUs', [MainController::class, 'aboutUs'])->name('aboutUs');
Route::get('globalPartener', [MainController::class, 'globalPartener'])->name('globalPartener');
Route::get('eventNews', [MainController::class, 'eventNews'])->name('eventNews');
Route::get('contactUs', [MainController::class, 'contactUs'])->name('contactUs');
Route::get('categoryItem', [MainController::class, 'categoryItem'])->name('categoryItem');
Route::get('old', [MainController::class, 'old'])->name('old');
Route::get('/dashboard', [CategoryController::class, 'dashboard'])->name('dashboard');
Route::get('department/{id}',[MainController::class, 'departmentShow'])->name('department.show');
Route::get('product/{id}',[MainController::class, 'productShow'])->name('product.show');
Route::get('company/{id}',[MainController::class, 'companyShow'])->name('company.show');
Route::get('modeel/{id}',[MainController::class, 'modeelShow'])->name('modeel.show');
Route::get('event/{id}',[MainController::class, 'eventShow'])->name('event.show');
// Route::get('pdf/{pp}',function($pp){
//     return "my ok";
// })->name('mypdf');*


Route::get('dashboard/slide/index',[SlideController::class,'index'])->name('dashboard.slide.index');
Route::get('dashboard/slide/create',[SlideController::class,'create'])->name('dashboard.slide.create');
Route::post('dashboard/slide/store',[SlideController::class,'store'])->name('dashboard.slide.store');
Route::get('dashboard/slide/edit/{id}',[SlideController::class, 'edit'])->name('dashboard.slide.edit');
Route::put('dashboard/slide/update/{id}',[SlideController::class, 'update'])->name('dashboard.slide.update');
Route::delete('dashboard/slide/destroy/{id}',[SlideController::class, 'destroy'])->name('dashboard.slide.destroy');

Route::get('dashboard/category/index',[CategoryController::class,'index'])->name('dashboard.category.index');
Route::get('dashboard/category/create',[CategoryController::class,'create'])->name('dashboard.category.create');
Route::post('dashboard/category/store',[CategoryController::class,'store'])->name('dashboard.category.store');
Route::get('dashboard/category/edit/{cateID}',[CategoryController::class, 'edit'])->name('dashboard.category.edit');
Route::put('dashboard/category/update/{cateID}',[CategoryController::class, 'update'])->name('dashboard.category.update');
Route::delete('dashboard/category/destroy/{cateID}',[CategoryController::class, 'destroy'])->name('dashboard.category.destroy');

Route::get('dashboard/subcategory/index',[SubCategoryController::class,'index'])->name('dashboard.subcategory.index');
Route::get('dashboard/subcategory/create',[SubCategoryController::class,'create'])->name('dashboard.subcategory.create');
Route::post('dashboard/subcategory/store',[SubCategoryController::class,'store'])->name('dashboard.subcategory.store');
Route::get('dashboard/subcategory/edit/{subID}',[SubCategoryController::class, 'edit'])->name('dashboard.subcategory.edit');
Route::put('dashboard/subcategory/update/{subID}',[SubCategoryController::class, 'update'])->name('dashboard.subcategory.update');
Route::delete('dashboard/subcategory/destroy/{subID}',[SubCategoryController::class, 'destroy'])->name('dashboard.subcategory.destroy');

Route::get('dashboard/product/index',[ProductController::class,'index'])->name('dashboard.product.index');
Route::get('dashboard/product/create',[ProductController::class,'create'])->name('dashboard.product.create');
Route::post('dashboard/product/store',[ProductController::class,'store'])->name('dashboard.product.store');
Route::get('dashboard/product/edit/{prodID}',[ProductController::class, 'edit'])->name('dashboard.product.edit');
Route::put('dashboard/product/update/{prodID}',[ProductController::class, 'update'])->name('dashboard.product.update');
Route::delete('dashboard/product/destroy/{prodID}',[ProductController::class, 'destroy'])->name('dashboard.product.destroy');


Route::get('dashboard/visit/index',[VisitController::class,'index'])->name('dashboard.visit.index');
Route::post('dashboard/visit/store',[VisitController::class,'store'])->name('visit.store');
Route::delete('dashboard/visit/destroy/{id}',[VisitController::class, 'destroy'])->name('dashboard.visit.destroy');

Route::get('dashboard/socialmedia/index',[SocialmediaController::class,'index'])->name('dashboard.socialmedia.index');
Route::get('dashboard/socialmedia/create',[SocialmediaController::class,'create'])->name('dashboard.socialmedia.create');
Route::post('dashboard/socialmedia/store',[SocialmediaController::class,'store'])->name('dashboard.socialmedia.store');
Route::get('dashboard/socialmedia/edit',[SocialmediaController::class, 'edit'])->name('dashboard.socialmedia.edit');
Route::put('dashboard/socialmedia/update/{id}',[SocialmediaController::class, 'update'])->name('dashboard.socialmedia.update');
Route::delete('dashboard/socialmedia/destroy/{id}',[SocialmediaController::class, 'destroy'])->name('dashboard.socialmedia.destroy');

Route::get('dashboard/address/index',[AddressController::class,'index'])->name('dashboard.address.index');
Route::get('dashboard/address/create',[AddressController::class,'create'])->name('dashboard.address.create');
Route::post('dashboard/address/store',[AddressController::class,'store'])->name('dashboard.address.store');
Route::get('dashboard/address/edit/{id}',[AddressController::class, 'edit'])->name('dashboard.address.edit');
Route::put('dashboard/address/update/{id}',[AddressController::class, 'update'])->name('dashboard.address.update');
Route::delete('dashboard/address/destroy/{id}',[AddressController::class, 'destroy'])->name('dashboard.address.destroy');

Route::get('contact-us', [ContactController::class, 'index']);
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us.store');


Route::get('product-index', [MainController::class,'productindexAjax']);
Route::post('searchProduct', [MainController::class,'searchProduct'])->name('search.product');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
