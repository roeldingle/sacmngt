<?php

Route::group(
	[
	'middleware' => ['web','auth'],
	 'prefix' => 'profile',
	  'namespace' => 'Modules\Profile\Http\Controllers'
	], function()
	{
    Route::get('/',[
		'uses' => 'ProfileController@index',
		'as' => 'profile.index',
	]);

	Route::get('/edit',[
		'uses' => 'ProfileController@edit',
		'as' => 'profile.edit',
	]);

	Route::post('/{id}/update',[
		'uses' => 'ProfileController@update',
		'as' => 'profile.update',
	]);


	Route::get('/change_password',[
		'uses' => 'ProfileController@change_password',
		'as' => 'profile.change_password',
	]);

	Route::post('/update_password',[
		'uses' => 'ProfileController@update_password',
		'as' => 'profile.update_password',
	]);


	
});
