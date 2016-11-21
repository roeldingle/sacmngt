<?php

Route::group(
	[
	'middleware' => ['web','auth'],
	 'prefix' => 'user',
	  'namespace' => 'Modules\User\Http\Controllers'
	], function()
{
    Route::get('/',[
		'uses' => 'UserController@index',
		'as' => 'user.index',
	]);

    Route::get('/create',[
		'uses' => 'UserController@create',
		'as' => 'user.create',
	]);

    Route::post('/store',[
		'uses' => 'UserController@store',
		'as' => 'user.store',
	]);

	Route::get('/{id}',[
		'uses' => 'UserController@show',
		'as' => 'user.show',
	]);

	Route::get('/{id}/edit',[
		'uses' => 'UserController@edit',
		'as' => 'user.edit',
	]);

	Route::post('/{id}/update',[
		'uses' => 'UserController@update',
		'as' => 'user.update',
	]);

	Route::post('/{id}/ajaxdelete',[
		'uses' => 'UserController@delete',
		'as' => 'user.delete',
	]);

	

	

	

	
});
