<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use \App\Http\Controllers\Admin\OrderinfosController as AdminOrderinfosController;
use App\Http\Controllers\Admin\ParserController;
use \App\Http\Controllers\Admin\UserController as AdminUserfosController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderinfosController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;

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
Route::group(['middleware' => 'auth'], function() {
    Route::get('/account', AccountController::class)->name('account');

    Route::get('/logout', function(){
        Auth::logout();
        return redirect()->route('login');
    })->name('account.logout');

    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'admin'], function(){
        Route::get('/parser', ParserController::class)->name('parser');
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
        Route::resource('/users', AdminUserfosController::class);
        Route::resource('/users/edit', AdminUserfosController::class);
    });
});

Route::get('/', [Controller::class, 'index']);


Route::get('/categories', [CategoryController::class, 'index'])
->name('categories/index');

Route::get('/all_news/news/{id}', [NewsController::class, 'showNews'])
->where('id', '\d+')
->name('news/showNews');

Route::get('/all_news/{category}', [NewsController::class, 'showCategoryNews'])
->name('all_news/showCategoryNews');

Route::resource('feedback', FeedbackController::class);

Route::resource('orderinfos', OrderinfosController::class);

Route::get("/session", function() {
    if(session()->has('test')) {
        dd(session()->all(), session()->get('test'));
        session()->forget('test');
    }

    session(['test' => rand(1, 1000)]);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function() {
    Route::get('auth/{network}/redirect', [SocialController::class, 'redirect'])
    ->where('network', '\w+')
    ->name('auth.redirect');
    Route::get('auth/{network}/callback', [SocialController::class, 'callback'])
    ->where('network', '\w+')
    ->name('auth.callback');
});
