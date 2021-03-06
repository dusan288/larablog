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

Route::get('/', ['uses' => 'BlogController@index']);

Route::get('/blog', ['uses' => 'BlogController@index']);
Route::get('blog/{article_id}/read', ['uses' => 'BlogController@showArticle', 'as' => 'read_article']);

//login routes:
Route::get('/login', ['uses' => 'AccountController@getLogin', 'as' => 'login']);
Route::post('/login', ['uses' => 'AccountController@postLogin']);

Route::get('/register', ['uses' => 'AccountController@getRegister']);
Route::post('/register', ['uses' => 'AccountController@postRegister']);
Route::any('/logout', ['uses' => 'AccountController@logout']);

//Protected routes, members only
Route::group(['middleware' => 'auth'], function(){
    Route::get('/blog/edit/{id}', ['uses' => 'BlogController@editArticle' ,'middleware' => 'author']);
    Route::post('/blog/edit/{id}', ['uses' => 'BlogController@saveChangedArticle', 'as' => 'edit_article']);
    Route::any('/blog/delete/{id}', ['uses' => 'BlogController@deleteArticle', 'as' => 'delete_article']);
    Route::get('/blog/new', ['uses' => 'BlogController@newArticle']);
    Route::post('blog/new', ['uses' => 'BlogController@saveArticle']);
    Route::get('/blog/{article_id}/comment', ['uses' => 'BlogController@getWriteComment', 'as' => 'write_comment']);
    Route::post('/blog/{article_id}/comment', ['uses' => 'BlogController@postSaveComment', 'as' => 'save_comment']);

});