<?php

$department_segment = Request::segment('2');

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
