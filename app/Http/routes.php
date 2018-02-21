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


Route::get('/',[
	'uses'=> 'UserController@getHalamanUtama',
	'as'=>'guest.home',
	'middleware' => 'guest'
]);

Route::post('/login',[
		'uses' => 'UserController@postHalamanProfile',
		'as' => 'guest.login',
		'middleware' => 'guest'
	]);


Route::group(['middleware'=>'auth'],function(){

	Route::get('/profile',[
			'uses' => 'UserController@getHalamanProfile',
			'as' => 'user.halaman_profile'
	]);

	Route::get('/logout',[
		'uses' => 'UserController@getLogout',
		'as' => 'user.logout'
	]);

	Route::get('/tambah_stock',[
		'uses' => 'UserController@getTambahStock',
		'as' => 'user.tambahstock'
	]);

	Route::get('/manajemen_barang',[
		'uses' => 'UserController@getManajemenBarang',
		'as' => 'user.manajemenbarang'
	]);

	Route::post('/post_barang',[
		'uses' => 'UserController@postManajemenBarang',
		'as' => 'user.tambahbarang'
	]);

	Route::post('/tambah_stock_barang',[
		'uses' => 'UserController@postTambahStock',
		'as' => 'user.post_tambahstock'
	]);


	Route::post('/kurangi_stock_barang',[
		'uses' => 'UserController@postKurangiStock',
		'as' => 'user.post_kurangstock'
	]);

	Route::get('/kurangi_stock',[
		'uses' => 'UserController@getKurangiStock',
		'as' => 'user.kurangstock'
	]);

	Route::get('/warning/{barang_id}/{selisih}',[
		'uses' => 'UserController@getHalamanWarning',
		'as' => 'user.warning'
	]);

	Route::post('/delete/{barang_id}/{selisih}',[
		'uses' => 'UserController@postKurangiFix',
		'as' => 'user.kurangifix'
	]);

	Route::get('/report',[
		'uses' => 'UserController@getReporting',
		'as' => 'user.reporting'
	]);

	Route::get('/invoice',[
		'uses' => 'InvoiceController@generatePDF',
		'as' => 'user.invoice'
	]);

});