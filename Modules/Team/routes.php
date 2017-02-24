<?php

Route::group(
	[
	'middleware' => ['web','auth'],
	 'prefix' => 'team',
	  'namespace' => 'Modules\Team\Http\Controllers'
	], function()
	{
    Route::get('/',[
		'uses' => 'TeamController@index',
		'as' => 'team.index',
	]);

    Route::get('/create',[
		'uses' => 'TeamController@create',
		'as' => 'team.create',
	]);

    Route::post('/store',[
		'uses' => 'TeamController@store',
		'as' => 'team.store',
	]);

	Route::get('/{id}',[
		'uses' => 'TeamController@show',
		'as' => 'team.show',
	]);

	Route::get('/{id}/edit',[
		'uses' => 'TeamController@edit',
		'as' => 'team.edit',
	]);

	Route::post('/{id}/update',[
		'uses' => 'TeamController@update',
		'as' => 'team.update',
	]);

	Route::post('/{id}/destroy',[
		'uses' => 'TeamController@destroy',
		'as' => 'team.destroy',
	]);

	Route::post('/getdepartmetuser',[
		'uses' => 'TeamController@getDepartmentUserData'
		//'as' => 'team.destroy',
	]);

	Route::post('/getdepartmetteam',[
		'uses' => 'TeamController@getDepartmentTeamData'
		//'as' => 'team.destroy',
	]);

});
