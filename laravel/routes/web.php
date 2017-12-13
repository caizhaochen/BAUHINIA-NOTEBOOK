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


Route::get('/', function () {
    return view('frontpage');
});


Route::get('home',function () {
    return view('frontpage');
});


Route::any('search','NotesController@search');
Route::any('myself','AdminController@myself');
Route::any('modifyInfo','AdminController@modifyInfo');
Route::any('modifyPass','AdminController@modifyPass');

Route::group(['middleware' => 'auth',  'prefix' => 'notebooks'], function() {
    Route::resource('/','NotebooksController');
    Route::any('store','NotebooksController@store');
    Route::any('show','NotebooksController@show');
    Route::any('edit/{id}','NotebooksController@edit');
    Route::any('update','NotebooksController@update');
    Route::any('search','NotebooksController@search');
    Route::any('searchbook','NotebooksController@searchBook');
    Route::any('delete/{id}','NotebooksController@delete');

//    Route::any('upload','SearchController@upload_img');
});
Route::group(['middleware' => 'auth',  'prefix' => 'notes'], function() {
    Route::resource('/','NotesController');
    Route::any('create','NotesController@createNote');
    Route::post('save','NotesController@save');
    Route::post('show','NotesController@show');
    Route::post('download','NotesController@download');
    Route::any('presentation/{id}','NotesController@presentation');
    Route::any('backtoshow','NotesController@backtoshow');
    Route::any('update','NotesController@update');
    Route::any('delete/{id}','NotesController@delete');

});
Route::group(['middleware' => 'auth',  'prefix' => 'friends'], function() {

    Route::any('add','FriendsController@friends');
    Route::any('search','FriendsController@search');
    Route::any('searchName','FriendsController@searchName');
    Route::any('follow/{id}','FriendsController@follow');
    Route::any('getfriends','FriendsController@getFriends');
    Route::any('cooperate','FriendsController@cooperate');
    Route::any('getShare','FriendsController@getShare');
    Route::any('presentation/{id}','FriendsController@presentation');
    Route::any('delete/{id}','FriendsController@delete');


});

Route::group(['middleware' => 'auth',  'prefix' => 'admin'], function() {

    Route::any('initial','AdminController@initial');
    Route::any('modify/{id}','AdminController@modify');
    Route::any('delete/{id}','AdminController@delete');
    Route::any('search','AdminController@search');
    Route::any('save','AdminController@save');
    Route::any('searchuser','AdminController@searchuser');

});

Route::any('contact',function (){
    return view('humor.contact');
});
Route::any('love',function (){
    return view('humor.love');
});