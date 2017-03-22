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

Route::get('/', 'Pages\PagesController@getIndex');
Route::get('o-drustvu', 'Pages\PagesController@getAboutUs');
Route::get('novice', 'Pages\PagesController@getNews');
Route::get('novice/{slug}', 'Pages\PagesController@getNewsDetails');
Route::get('clani', 'Pages\PagesController@getMembers');
Route::get('kontakt', 'Pages\PagesController@getContact');
Route::post('kontakt', 'Pages\PagesController@postContact');
