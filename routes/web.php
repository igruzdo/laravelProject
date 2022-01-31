<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use \App\Http\Controllers\Admin\OrderinfosController as AdminOrderinfosController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderinfosController;

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


Route::group(['as' => 'admin.', 'prefix' => 'admin'], function(){
    Route::view('/', 'admin.index')->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/categories/edit', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/news/edit', AdminNewsController::class);
    Route::resource('/news/destroy', AdminNewsController::class);
    Route::resource('/feedback', AdminFeedbackController::class);
    Route::resource('/feedback/edit', AdminFeedbackController::class);
    Route::resource('/feedback/destroy', AdminFeedbackController::class);
    Route::resource('/orderinfos', AdminOrderinfosController::class);
    Route::resource('/orderinfos/edit', AdminOrderinfosController::class);
    Route::resource('/orderinfos/destroy', AdminOrderinfosController::class);
});

Route::get('/categories', [CategoryController::class, 'index'])
->name('categories/index');

Route::get('/all_news/news/{id}', [NewsController::class, 'showNews'])
->where('id', '\d+')
->name('news/showNews');

Route::get('/all_news/{category}', [NewsController::class, 'showCategoryNews'])
->name('all_news/showCategoryNews');

Route::resource('feedback', FeedbackController::class);

Route::resource('orderinfos', OrderinfosController::class);

