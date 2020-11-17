<?php

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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/join', 'JoinController@index')->name('join');
Route::get('/faq', 'FaqController@index')->name('faq');

//WIKI
Route::get('/wiki', 'WikiController@index')->name('wiki');
Route::get('/wiki/{id}', 'WikiController@view')->name('wiki-view');

//VOTE
Route::get('/vote', 'VoteController@index')->name('vote');
Route::post('/vote/step/one', 'VoteController@stepOne')->name('vote-step-one');
Route::post('/vote/step/three', 'VoteController@stepThree')->name('vote-step-three');
