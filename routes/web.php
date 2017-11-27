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

// routes needed for the LIVE pages
Auth::routes();

Route::get('/', 				'HomeController@index')->name('home');
Route::get('jquery-loadmore', 	'HomeController@loadMore')->name('jquery-loadmore');
Route::get('category/{name}', 	'CategoryController@index')->where('name', '[-A-Za-z]+');
Route::get('search', 			'SearchController@index');
Route::resource('free-ui', 		'LiveDesignController');
Route::post('subscriptions', 	'SubscriptionController@store');
Route::resource('contact', 		'ContactController', ['only' => [
	'index', 'store'
]]);
// routes needed for the LIVE pages

// routes needed for the ADMIN panel 
Route::prefix('cms')->middleware(['user.with.role:admin'])->group(function () {

	Route::get('logout', 						'Auth\LoginController@logout')->name('logout');
    Route::resource('users', 					'UserController');
    Route::get('users/{user}/change-password', 	'UserController@changeUserPassword')->name('inner-admin-change-pass');
    Route::post('users/{user}/change-password', 'UserController@postChangedUserPassword')->name('post-inner-admin-change-pass');
    Route::resource('designs', 					'DesignController', ['except' => [
	    'show', 'destroy'
	]]);
    Route::get('designs/{design}', 				'DesignController@destroy')->name('delete-design');
    Route::get('subscriptions', 				'SubscriptionController@index')->name('subscriptions');
});
// routes needed for the ADMIN panel


