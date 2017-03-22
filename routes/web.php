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

$this->get('/', 'Pages\PagesController@getIndex');
$this->get('o-drustvu', 'Pages\PagesController@getAboutUs');
$this->get('vozila-in-tehnika/{sub}', 'Pages\PagesController@getVehiclesAndSystems');
$this->get('novice', 'Pages\PagesController@getNews');
$this->get('novice/{slug}', 'Pages\PagesController@getNewsDetails');
$this->get('clani', 'Pages\PagesController@getMembers');
$this->get('kontakt', 'Pages\PagesController@getContact');
$this->post('kontakt', 'Pages\PagesController@postContact');

// Authentication Routes...
$this->get('prijava', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('prijava', 'Auth\LoginController@login');
$this->get('odjava', 'Auth\LoginController@logout')->name('logout');

$this->group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    $this->resource('novice', 'Admin\NewsController', ['except' => 'show']);
    $this->resource('novice.slike', 'Admin\NewsImagesController', ['only' => ['store', 'destroy']]);
    $this->resource('clani',  'Admin\MembersController', ['except' => 'show']);
});


