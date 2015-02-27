<?php

Route::get('/', 'WelcomeController@index');
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index',]);


