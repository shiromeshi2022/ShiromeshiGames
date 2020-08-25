<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BrainController;
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

//ホームページ
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

//マイページ
Route::get('/home', 'HomeController@index')->name('home');
Route::group(["prefix"=>"home"], function() {
    Route::get("/edit", "HomeController@edit")->name('home.edit');
    Route::post("/update/{id}", "HomeController@update");
    Route::post("/destroy/{id}", "HomeController@destroy");
});



//-----------------------------------------------------------------------------------------------------
//-----[brain]の開始タグ----->
Route::group(["prefix"=> "brain"], function() {
    Route::get("/welcome", "BrainController@welcome")->name('brain.welcome');
    Route::get("/calculate", "BrainController@calculate")->name('brain.calculate');
    Route::post("/calculate_record/{id}", "BrainController@calculate_record");
});
//-----[brain]終了タグ-----
//------------------------------------------------------------------------------------------------------>

//webschcool
Route::group(["prefix"=> "webschool"], function() {
    Route::get("/welcome", "WebschoolController@welcome")->name('webschool.welcome');
    Route::get("/prefectures", "WebschoolController@prefectures")->name('webschool.prefectures');
    Route::post("/prefectures_record/{id}", "WebschoolController@prefectures_record");
});

//computer
Route::group(["prefix"=> "computer"], function() {
    Route::get("/welcome", "ComputerController@welcome")->name('computer.welcome');
    Route::get("/typing", "ComputerController@typing")->name('computer.typing');
    Route::post("/typing_record/{id}", "ComputerController@typing_record");
    Route::get("/hiyokotyping", "ComputerController@hiyokotyping")->name('computer.hiyokotyping');
    Route::post("/hiyokotyping_record/{id}", "ComputerController@hiyokotyping_record");
});
