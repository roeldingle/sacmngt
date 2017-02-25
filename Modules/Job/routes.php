<?php

Route::group(
	[
	'middleware' => ['web','auth'],
	 'prefix' => 'job',
	  'namespace' => 'Modules\Job\Http\Controllers'
	], function()
	{
    Route::get('/',[
		'uses' => 'JobController@index',
		'as' => 'job.index',
	]);

    Route::get('/create',[
		'uses' => 'JobController@create',
		'as' => 'job.create',
	]);

    Route::post('/store',[
		'uses' => 'JobController@store',
		'as' => 'job.store',
	]);

	Route::get('/{id}',[
		'uses' => 'JobController@show',
		'as' => 'job.show',
	]);

	Route::get('/{id}/edit',[
		'uses' => 'JobController@edit',
		'as' => 'job.edit',
	]);

	Route::post('/{id}/update',[
		'uses' => 'JobController@update',
		'as' => 'job.update',
	]);

	Route::post('/{id}/destroy',[
		'uses' => 'JobController@destroy',
		'as' => 'job.destroy',
	]);


});
