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


Route::get('login', 'LoginController@getLogin');
Route::post('login', 'LoginController@postLogin');

Route::get('logout', function(){
	Auth::logout();
	return view('login');
});

Route::get('signUp', 'SignUpController@getSignUp');
Route::post('signUp', 'SignUpController@postSignUp');



Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callbackGG');

Route::post('postResetPassword', 'ResetPasswordController@sendMail');
Route::get('resetPassword', 'ResetPasswordController@reset');

Route::post('resetPasswordForm', 'ResetPasswordController@resetPasswordForm');

// ->middleware('auth');

Route::group(['middleware' => 'auth'], function()
{
	Route::get('/', 'UserController@index');
	Route::get('/home', 'UserController@index');
	Route::get('myProfile', 'UserController@getMyProfile');
	Route::get('user', 'UserController@getUserProfile');
	Route::get('follow', 'UserController@postFollow');
	Route::get('unFollow', 'UserController@postUnFollow');
	Route::get('account-setting', 'UserController@getAccountSetting');
	Route::get('ajaxSearchUser', 'UserController@ajaxSearchUser');

	Route::post('postEntry', 'UserController@postEntry');

	Route::get('message', 'UserController@getMessage');

	Route::get('following', 'UserController@getFollowing');
	Route::get('follower', 'UserController@getFollower');

	Route::get('search', 'UserController@getSearch');

	Route::get('comment', 'UserController@postComment');

	Route::get('replyComment', 'UserController@replyComment');
});

