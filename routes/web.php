<?php

use Illuminate\Support\Facades\Route;
//Frontend routes
Route::group(['namespace'=>'frontend'],function(){
   Route::any('/','ApplicationController@index')->name('index');
   Route::any('contact','ApplicationController@contact')->name('contact');

   Route::any('login','ApplicationController@login')->name('login');
});

Route::group(['namespace'=>'backend'],function(){
    Route::any('admin-login',"AdminUserController@login")->name('admin-login');
});


//Backend routes
Route::group(['namespace'=>'backend','prefix'=>'admin','middleware'=>'auth:admin'],function(){
    Route::any('/','DashboardController@index')->name('admin');

    Route::group(['prefix' => 'admin-user'],function(){
        Route::any('/','AdminUserController@index')->name('admin-users');
        Route::any('/add-admin-user','AdminUserController@add')->name('add-admin-user');
        Route::any('update-admin-status','AdminUserController@updateStatus')->name('update-admin-status');
        Route::any('update-admin-type','AdminUserController@updateAdminType')->name('update-admin-type');
        Route::any('delete-admin-user/{criteria?}','AdminUserController@delete')->name('delete-admin-user');
        Route::any('edit-admin-user/{criteria?}','AdminUserController@edit')->name('edit-admin-user');
        Route::any('edit-admin-user-action','AdminUserController@editAction')->name('edit-admin-user-action');
    });

    Route::any('admin-logout','AdminUserController@logout')->name('admin-logout');
});
