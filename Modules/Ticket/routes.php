<?php

$department_segment = Request::segment('2');

/****************ticket****************************/
Route::group(
	[
	'middleware' => ['web','auth','ticket.owner'],
	 'prefix' => 'ticket/'.$department_segment,
	  'namespace' => 'Modules\Ticket\Http\Controllers'
	], function()
	{


    Route::get('/',[
		'uses' => 'TicketController@index',
		'as' => 'ticket.index',
	]);

    Route::get('/create',[
		'uses' => 'TicketController@create',
		'as' => 'ticket.create',
	]);

    Route::post('/store',[
		'uses' => 'TicketController@store',
		'as' => 'ticket.store',
	]);

	Route::get('/{code}',[
		'uses' => 'TicketController@show',
		'as' => 'ticket.show',
	]);

	Route::get('/{code}/edit',[
		'uses' => 'TicketController@edit',
		'as' => 'ticket.edit',
	]);

	Route::post('/{code}/update',[
		'uses' => 'TicketController@update',
		'as' => 'ticket.update',
	]);

	Route::post('/{id}/destroy',[
		'uses' => 'TicketController@destroy',
		'as' => 'ticket.destroy',
	]);



});

/****************support****************************/
Route::group(
	[
	'middleware' => ['web','auth','ticket.support'],
	 'prefix' => 'support/'.$department_segment,
	  'namespace' => 'Modules\Ticket\Http\Controllers'
	], function()
	{


    Route::get('/',[
		'uses' => 'SupportController@index',
		'as' => 'support.index',
	]);

    Route::get('/create',[
		'uses' => 'SupportController@create',
		'as' => 'support.create',
	]);

    Route::post('/store',[
		'uses' => 'SupportController@store',
		'as' => 'support.store',
	]);

	Route::get('/{code}',[
		'uses' => 'SupportController@show',
		'as' => 'support.show',
	]);

	Route::get('/{code}/edit',[
		'uses' => 'SupportController@edit',
		'as' => 'support.edit',
	]);

	Route::post('/{code}/update',[
		'uses' => 'SupportController@update',
		'as' => 'support.update',
	]);

	Route::post('/{id}/destroy',[
		'uses' => 'SupportController@destroy',
		'as' => 'support.destroy',
	]);

	Route::post('/{code}/ajaxupdatestatus',[
		'uses' => 'SupportController@ajaxUpdateStatus',
		'as' => 'support.ajaxUpdateStatus',
	]);

});


/****************reply****************************/
Route::group(
	[
	'middleware' => ['web','auth'],
	 'prefix' => 'reply/'.$department_segment,
	  'namespace' => 'Modules\Ticket\Http\Controllers'
	], function()
	{

    Route::post('/store',[
		'uses' => 'ReplyController@store',
		'as' => 'reply.store',
	]);


	Route::post('/{id}/update',[
		'uses' => 'ReplyController@update',
		'as' => 'reply.update',
	]);

	Route::post('/{id}/destroy',[
		'uses' => 'ReplyController@destroy',
		'as' => 'reply.destroy',
	]);

});
