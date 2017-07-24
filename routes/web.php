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

Auth::routes();
Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

//Artist Routes
Route::get('/artists', 'ArtistController@index')->name('artists');
Route::get('/artist/{id}', 'ArtistController@artist')->name('artistDetail');
Route::post('/artist/create', 'ArtistController@create')->name('artistCreate');
Route::post('/artist/edit', 'ArtistController@edit')->name('artistEdit');
Route::post('/artist/delete', 'ArtistController@delete')->name('artistDelete');
Route::any('/artist/changePag', 'ArtistController@changePage')->name('artistChangePag');

//Album Routes
Route::get('/albums', 'AlbumController@index')->name('albums');
Route::get('/album/{id}', 'AlbumController@album')->name('albumDetail');
Route::post('/album/create', 'AlbumController@create')->name('albumCreate');
Route::any('/album/delete', 'AlbumController@delete')->name('albumDelete');
Route::any('/album/edit/{id}', 'AlbumController@goToEdit')->name('albumGoEdit');
Route::any('/album/editAlbum', 'AlbumController@editAlbum')->name('albumEdit');
Route::any('/album/uploadCover', 'AlbumController@uploadCover')->name('uploadCover');


