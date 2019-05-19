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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/glossary/{glossary}/detail', 'GlossaryController@show')->name('show-glossary');
Route::get('/glossary/all', 'GlossaryController@index')->name('index-glossary');
Route::get('/glossary/create', 'GlossaryController@create')->name('new-glossary');
Route::post('/glossary/create', 'GlossaryController@store')->name('store-glossary');

Route::get('/glossary/search', 'GlossaryController@search')->name('search-glossary');
Route::get('/user/{user}/glossaries', 'GlossaryController@byUser')->name('user-glossaries');

Route::get('/term/{term}/translation', 'TranslationController@show')->name('show-translation');
Route::get('/term/{term}/translation/new', 'TranslationController@create')->name('new-translation');
Route::post('/term/{term}/translation/new', 'TranslationController@store')->name('store-translation');
