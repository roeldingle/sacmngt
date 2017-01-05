<?php

Route::group(
	[
	'middleware' => ['web','auth'],
	 'prefix' => 'department',
	  'namespace' => 'Modules\Department\Http\Controllers'
	], function()
	{
    Route::get('/',[
		'uses' => 'DepartmentController@index',
		'as' => 'department.index',
	]);

    Route::get('/create',[
		'uses' => 'DepartmentController@create',
		'as' => 'department.create',
	]);

    Route::post('/store',[
		'uses' => 'DepartmentController@store',
		'as' => 'department.store',
	]);

	Route::get('/{id}',[
		'uses' => 'DepartmentController@show',
		'as' => 'department.show',
	]);

	Route::get('/{id}/edit',[
		'uses' => 'DepartmentController@edit',
		'as' => 'department.edit',
	]);

	Route::post('/{id}/update',[
		'uses' => 'DepartmentController@update',
		'as' => 'department.update',
	]);

	Route::post('/{id}/destroy',[
		'uses' => 'DepartmentController@destroy',
		'as' => 'department.destroy',
	]);


	
});
