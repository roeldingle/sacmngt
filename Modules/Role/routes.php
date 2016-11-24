<?php

Route::group(
	[
	'middleware' => ['web','auth'],
	 'prefix' => 'role',
	  'namespace' => 'Modules\Role\Http\Controllers'
	], function()
	{
    Route::get('/',[
		'uses' => 'RoleController@index',
		'as' => 'role.index',
	]);

    Route::get('/create',[
		'uses' => 'RoleController@create',
		'as' => 'role.create',
	]);

    Route::post('/store',[
		'uses' => 'RoleController@store',
		'as' => 'role.store',
	]);

	Route::get('/{id}',[
		'uses' => 'RoleController@show',
		'as' => 'role.show',
	]);

	Route::get('/{id}/edit',[
		'uses' => 'RoleController@edit',
		'as' => 'role.edit',
	]);

	Route::post('/{id}/update',[
		'uses' => 'RoleController@update',
		'as' => 'role.update',
	]);

	Route::post('/{id}/destroy',[
		'uses' => 'RoleController@destroy',
		'as' => 'role.destroy',
	]);


	
});
