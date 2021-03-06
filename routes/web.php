<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderinfoController;

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
    Route::resource('/news', AdminNewsController::class);
});


Route::get('/news', [NewsController::class, 'index'])
->name('news/index');


Route::get('/all_news/news/{id}', [NewsController::class, 'showNews'])
->where('id', '\d+')
->name('news/showNews');

Route::get('/all_news/{category}', [NewsController::class, 'showCategoryNews'])
->name('all_news/showCategoryNews');

Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::get('orderinfo', [OrderinfoController::class, 'index'])->name('orderinfo');