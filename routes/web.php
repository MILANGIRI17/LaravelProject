<?php

use Illuminate\Support\Facades\Route;
//Frontend routes
Route::group(['namespace'=>'frontend'],function(){
   Route::any('/','ApplicationController@index')->name('index');
   Route::any('contact','ApplicationController@contact')->name('contact');
});


//Backend routes
Route::group(['namespace'=>'backend','prefix'=>'admin'],function(){
    Route::any('/','DashboardController@index')->name('admin');
});
