<?php

Route::group(
	[
	'middleware' => ['web','auth'],
	 'prefix' => 'myteam',
	  'namespace' => 'Modules\Myteam\Http\Controllers'
	], function()
	{
    Route::get('/',[
		'uses' => 'MyteamController@index',
		'as' => 'myteam.index',
	]);

	Route::get('/edit',[
		'uses' => 'MyteamController@edit',
		'as' => 'myteam.edit',
	]);

	Route::post('/{id}/update',[
		'uses' => 'MyteamController@update',
		'as' => 'myteam.update',
	]);


	Route::get('/change_password',[
		'uses' => 'MyteamController@change_password',
		'as' => 'myteam.change_password',
	]);

	Route::post('/update_password',[
		'uses' => 'MyteamController@update_password',
		'as' => 'myteam.update_password',
	]);


	
});