<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', "GuestController@Index")->name("actu");
Route::get('gallery', "GuestController@gallery")->name("gallery");
Route::get('activity', "GuestController@Activity")->name("activity");
Route::get('sentiers', "GuestController@sentiers")->name("sentiers");
Route::get('chalets', "GuestController@chalets")->name("chalets");
Route::get('construction',"GuestController@construction")->name("construction");
Route::get('infosFede', "GuestController@infosFede")->name("infosFede");

Route::middleware("auth.validated")->group(function (){

    Route::get("compterendus", "GuestController@compterendus")->name("compterendus");
    Route::resource('galleries','GalleryController', ["except" => ["update","delete","store"]]);

    Route::prefix("admin")->middleware("auth.admin")->group(function () {
        Route::get("/", "AdminController@Index")->name("admin");
        Route::resource('articles', "ArticleController", ["except" => "show"]);
        Route::get('inscriptions', 'AdminController@editUsers')->name("inscriptions");
        Route::get('inscriptionsUpdate', 'AdminController@updateUsers')->name("inscriptionsUpdate"); 
        // Route::get('showUsersByPrivilege', 'AdminController@showUsersByPrivilege')->name("showUsersByPrivilege"); 
        Route::resource('galleries','GalleryController',["except"=> ["store","update"]]);
        Route::resource('compterendus','CompterendusController'); 
    });

});

Auth::routes();

Route::post('/attachments','AttachmentController@store')->name('attachments.store');
