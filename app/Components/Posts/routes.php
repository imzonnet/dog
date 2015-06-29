<?php

Route::group(['prefix' => 'backend', 'middleware' => 'auth.backend'], function() {

    Route::resource('posts', 'Backend\PostController');
    Route::resource('post-categories', 'Backend\CategoryController');

    Route::resource('pages', 'Backend\PostController');

});

Route::get('/page/{slug}/{id}', ['as'=>'page.show', 'uses' =>'Frontend\PostController@getPage']);
Route::get('/post/{slug}/{id}', ['as'=>'post.show', 'uses' =>'Frontend\PostController@getPost']);
Route::get('/page/frequently-asked-questions', ['as'=>'post.faq', 'uses' =>'Frontend\PostController@getFaq']);