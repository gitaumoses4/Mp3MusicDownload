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

Route::get('/', ['uses' => 'MainController@index', "as" => "index"]);

Route::get('about', ['uses' => 'MainController@about', "as" => "about"]);

Route::get('privacy', ['uses' => 'MainController@privacy', "as" => "privacy"]);

Route::get('howto', ['uses' => 'MainController@howto', "as" => "howto"]);

Route::get('topArtists', ['uses' => 'MainController@topArtists', "as" => "topArtists"]);

Route::get('popularMusic', ['uses' => 'MainController@popularMusic', "as" => "popularMusic"]);

Route::get('dmca', ['uses' => 'MainController@dmca', "as" => "dmca"]);

Route::get("admin", ['middleware' => 'auth', 'uses' => 'MainController@index', "as" => "adminIndex"]);

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post("/updateSources", ['uses' => "AdminController@updateSources"]);

Route::get("/search", ['uses' => 'SearchController@search', 'as' => 'search']);

Route::get("/editSources", ['uses' => 'MainController@editSources', 'as' => 'editSources']);

Route::get("/juices", function() {
    return view("juices");
});

Route::get("/checkDownload", ['uses' => 'CheckDownloadController@index', 'as' => 'checkDownload']);
