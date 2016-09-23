<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pages/login.html', function () {
    return view('welcome');
});

/*
	Unauthenticated group
*/

Route::group(array('middleware' => 'guest'), function(){

/*
	CSRF protection
*/

	Route::group(array('before' => 'csrf'), function(){

		Route::post('/account/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));


	});
});

/*
	Authenticated group
*/

Route::group(array('middleware' => 'auth'), function(){

	Route::group(array('before' => 'csrf'), function(){

		Route::post('/patients/post_registration', array(
			'as' => 'registration',
			'uses' => 'PatientController@postRegister'
		));

		Route::post('/patients/registration', array(
			'as' => 'post-edit',
			'uses' => 'PatientController@postEdit'
		));

	});

	Route::get('/view/{id}', array(
		'as'	=> 'edit',
		'uses'	=> 'PatientController@edit'
	));

	Route::get('/delete/{id}', array(
		'as'	=> 'delete',
		'uses'	=> 'PatientController@delete'
	));

	Route::get('/patients/register', array(
		'as' => 'register-patient',
		'uses' => 'PatientController@register'
	));

	Route::get('/patients/view', array(
		'as' => 'view-patient',
		'uses' => 'PatientController@view'
	));
});

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');

