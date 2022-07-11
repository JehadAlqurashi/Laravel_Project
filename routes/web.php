<?php
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\offerController;
use Illuminate\Foundation\Console\DownCommand;
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
Route::get("/",function(){
    return view("welcome");
});
Route::get('/offers',[offerController::class,"getOffer"]);
Route::get("/redirect/{service}",[Controllers\SocialController::class,"redirect"]);
Route::get("/callback/{service}",[Controllers\SocialController::class,"callback"]);

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

        Route::group(['prefix' => 'offer'],function(){
            Route::get("create",[offerController::class,"create"]);
            Route::get("show",[offerController::class,"show"]);
        });



    Route::post('store',[offerController::class,"store"])->name("offers.store");
});
Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("verified");
