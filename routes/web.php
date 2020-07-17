<?php

Route::group(['middleware' => ['web']], function () {




    Route::get('index', 'PageController@index');
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\AuthController@register']);
    Route::post('register', 'Auth\AuthController@store');


    Route::get('login', ['as' => 'login', 'uses' => 'Auth\SessionsController@create2']);
    Route::post('login', 'Auth\SessionsController@login');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\SessionsController@destroy']);

//    Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
//    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//
//
//    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
//    Route::post('password/reset', 'Auth\ResetPasswordController@Reset')->name('password.reset');

    Route::resource('categories','CategoryController',['except'=>['create']]);
    Route::resource('tags','TagController',['except'=>['create']]);

    Route::post('comments/{post_id}',['uses'=>'CommentsController@store', 'as' =>'comments.store']);
    Route::get('comments/{id}/edit',['uses'=>'CommentsController@edit', 'as' =>'comments.edit']);
    Route::put('comments/{id}',['uses'=>'CommentsController@update', 'as' =>'comments.update']);
    Route::delete('comments/{id}',['uses'=>'CommentsController@destroy', 'as' =>'comments.destroy']);
    Route::get('comments/{id}/delete',['uses'=>'CommentsController@delete', 'as' =>'comments.delete']);


    Route::resource('posts', 'PostController');
    Route::get('contact', 'PageController@getContact');
    Route::post('contact', 'PageController@postContact');
    Route::get('about', 'PageController@getAbout');
    Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
    Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);


});




