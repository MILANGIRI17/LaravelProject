<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'frontend'],function(){
   Route::any('/','ApplicationController@index')->name('index');
   Route::any('contact','ApplicationController@contact')->name('contact');
});
