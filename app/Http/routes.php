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

Route::get('/', [
	'uses' => 'ViewsController@toDashboard',
	'as'   => 'dashboard'
	]);
Route::get('/sign-up',[
	'uses' => 'ViewsController@toRegisterPage',
	'as'   => 'sign-up'
	]);
Route::get('/sign-in',[
	'uses' => 'ViewsController@toLoginPage',
	'as'   => 'sign-in'
	]);
// Route::get('/dashboard',[
// 	'middleware' => 'auth',
// 	'uses' => 'ViewsController@toDashboard',
// 	'as' => 'dashboard'

// 	]);


Route::post('/register',[
	'uses' => 'UsersController@register',
	'as'   => 'register'
	]);
Route::post('/login',[
	'uses' => 'UsersController@login',
	'as'   => 'login'
	]);

Route::get('/logout',[
	'uses' => 'UsersController@logout',
	'as'   => 'logout'
	]);


Route::get('/profile',[
	'uses' => 'UsersController@profile',
	'as'   => 'profile'
	]);

Route::get('/edit-profile/{id}',[
	'uses' => 'UsersController@edit_profile',
	'as'   => 'edit-profile'
	]);

Route::post('/update-profile',[
	'uses' => 'UsersController@update_profile',
	'as'   => 'update-profile'
	]);
Route::get('/profileimage/{filename}',[
	'uses' => 'UsersController@getProfileImage',
	'as'   => 'avatar.image'
	]);
Route::get('photos',[
	'uses' => 'UsersController@getPhotoPage',
	'as'   => 'users.photos'
	]);

Route::post('add-image',[
	'uses' => 'PhotosController@add_photo',
	'as'   => 'add.image'
	]);

Route::get('/show_photo/{filename}',[
	'uses' => 'PhotosController@showPhoto',
	'as'   => 'show.photo'
	]);
Route::get('/delete-image/{name}',[
	'uses' => 'PhotosController@delete_image',
	'as'   => 'delete.image'
	]);

Route::get('/category',function(){

	return view('category');
});
	
//////////////////////////////////////
// Route::get('/',[
// 	'uses' => 'MoviesController@random_movie',
// 	'as' => 'random_movie'
// 	]);

//Route::get('/', 'YoutubeController@getMoviesFromYoutube');

Route::get('/title/{name_slug}',[
		'uses' => 'YoutubeController@show',
		'as'   => 'show.movie.page'
	]);