<?php

Route::group(
	[
	 'middleware' => 'web',
	 'namespace' => 'Modules\Login\Http\Controllers'
	], function()
{
    Route::get('/login', 'LoginController@index');
    Route::post('/login', 'LoginController@postLogin');

    Route::get('/logout', 'LoginController@getLogout');
});

