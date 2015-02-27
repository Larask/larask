<?php

Route::get('/', 'WelcomeController@index');
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index',]);

Route::resource('registration', 'RegistrationController', ['only' => ['create', 'store']]);
