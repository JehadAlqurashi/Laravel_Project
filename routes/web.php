<?php
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\offerController;
use App\Http\Controllers\OfferController2;
use App\Http\Controllers\VideoController;
use App\Models\Offer;
use App\Models\Video;
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

        Route::group(['prefix' => 'offers'],function(){
            Route::get("create",[offerController::class,"create"]);
            Route::get("show",[offerController::class,"show"])->name('offers.show');
            Route::get("edit/{id}",[offerController::class,'edit'])->name('offers.edit');
            Route::post("update/{id}",[offerController::class,'update'])->name("offers.update");
            Route::get("delete/{id}",[offerController::class,'delete'])->name('offers.delete');
            Route::post('store',[offerController::class,"store"])->name("offers.store");
        });

        // Route::get("video",[VideoController::class,'view'])->middleware('verified');



});
Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("verified");
Route::group(['prefix'=>'ajax'],function(){
    Route::get("create",[OfferController2::class,'create']);
    Route::post("store",[OfferController2::class,'store'])->name('ajax.store');
    Route::get("show",[OfferController2::class,'show'])->name("ajax.show");
    Route::post("delete",[OfferController2::class,"delete"])->name("ajax.delete");
    Route::get("edit/{id}",[OfferController2::class,'edit'])->name("ajax.edit");
    Route::post("update",[OfferController2::class,"update"])->name("ajax.update");
});
Route::group(['middleware'=>'verified'],function(){
    Route::get("adult",[Controllers\Auth\CustomAuth::class,"adult"])->middleware("CheckAge");
    Route::get("dashboard",function(){
        return "You Are Not Allowed";
    })->name("not.adult");
});

