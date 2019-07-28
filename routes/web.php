<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

	Route::group(['prefix' => 'admin'], function () {

		Route::group(['middleware' => ['role:admin|receptionist']], function() {
		  

			Route::get('departments', 'DepartmentsController@show');

			Route::get('/addrooms', 'RoomsController@create');
			Route::post('/addrooms', 'RoomsController@store');
			Route::get('/rooms', 'RoomsController@index');
			Route::get('/room/{id?}', 'RoomsController@show');
			Route::get('/room/{id?}/edit','RoomsController@edit');
			Route::post('/room/{id?}/edit','RoomsController@update');
			Route::post('/room/{id?}/delete','RoomsController@destroy');

			Route::get('/addusers', 'UsersController@create');
			Route::post('/addusers', 'UsersController@store');
			Route::get('/users', 'UsersController@index');
			Route::get('/user/{id?}/edit','UsersController@edit');
			Route::post('/user/{id?}/edit','UsersController@update');
			Route::post('/user/{id?}','UsersController@destroy');



			Route::get('/log', 'LogsController@index');
			Route::post('/log/delete', 'LogsController@destroy');
		   
		});



		Route::group(['middleware' => ['role:admin|editor']], function() {
		  

		    Route::get('/addposts', 'PostsController@create');
			Route::post('/addposts', 'PostsController@store');
			Route::get('/posts', 'PostsController@index');
			Route::get('/post/{id?}', 'PostsController@show');
			Route::get('/post/{id?}/edit','PostsController@edit');
			Route::post('/post/{id?}/edit','PostsController@update');
			Route::post('/post/{id?}/delete','PostsController@destroy');

			Route::get('/addevents', 'EventsController@create');
			Route::post('/addevents', 'EventsController@store');
			Route::get('/events', 'EventsController@index');
			Route::get('/events/list', 'EventsController@listEvents');
			Route::get('/event/{id?}/edit','EventsController@edit');
			Route::post('/event/{id?}/edit','EventsController@update');
			Route::post('/event/{id?}','EventsController@destroy');

		});


		Route::group(['middleware' => 'role:admin'], function () {

			Route::get('/settings/1/edit','SettingsController@index');
			Route::post('/settings/1/edit','SettingsController@update');

		});


		Route::get('/receptionists', 'UsersController@listreceptionists');
		Route::get('/receptionist/{id?}', 'UsersController@showreceptionistprofile');
		Route::get('/receptionist/{id?}/pdf', 'UsersController@pdfReceptionist');
		Route::get('/receptionist/{id?}/excel', 'UsersController@excelReceptionist');

		Route::get('/editors', 'UsersController@listeditors');
		Route::get('/editor/{id?}', 'UsersController@showeditorprofile');
		Route::get('/editor/{id?}/pdf', 'UsersController@pdfEditor');
		Route::get('/editor/{id?}/excel', 'UsersController@excelEditor');


		Route::get('/doctors', 'UsersController@listdoctors');
		Route::get('/doctor/{id?}', 'UsersController@showdoctorprofile');
		Route::post('/doctor/{id?}', 'UsersController@storeReview');
		Route::get('/doctor/{id?}/pdf', 'UsersController@pdfDoctor');
		Route::get('/doctor/{id?}/excel', 'UsersController@excelDoctor');

		Route::get('/nurses', 'UsersController@listnurses');
		Route::get('/nurse/{id?}', 'UsersController@shownurseprofile');
		Route::get('/nurse/{id?}/pdf', 'UsersController@pdfNurse');
		Route::get('/nurse/{id?}/excel', 'UsersController@excelNurse');

		Route::get('/patients', 'UsersController@listpatients');
		Route::get('/patient/{id?}/pdf', 'UsersController@pdfPatient');
		Route::get('/patient/{id?}/excel', 'UsersController@excelPatient');

		Route::get('/addmessage', 'MessagesController@create');
		Route::post('/addmessage', 'MessagesController@store');
		Route::get('/messages', 'MessagesController@index');
		Route::get('/message/{id?}', 'MessagesController@show');

		Route::get('/patient/{id?}', 'UsersController@showpatientprofile');
		Route::get('/patient/{id?}/invoice', 'UsersController@invoice');

		Route::get('dashboard', 'DashboardController@index');





	});


	Route::resource('department-ajax', 'DepartmentsController');

});



Auth::routes();

Route::get('/' , 'PublicController@index');

Route::get('/home', 'HomeController@index')->name('home');
