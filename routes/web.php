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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name("home");

Route::get('page1', function () {
    return view('page1');
})->name("page1");

Route::middleware("auth.validated")->group(function (){

    Route::get("compteRendu", function () {
        return view('home');
    })->name("compte");

    Route::prefix("admin")->middleware("auth.admin")->group(function () {
        Route::get("compteRendu", function () {
            return view('page1');
        })->name("admin");
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
