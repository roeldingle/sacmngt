<?php

Route::group([
	'middleware' => 'web', 
	'prefix' => 'registration', 
	'namespace' => 'Modules\Registration\Http\Controllers'
	], function()
{
    Route::get('/', 'RegistrationController@index');
    Route::post('/', 'RegistrationController@postRegister');
});
