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
//===== Admin ====
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){	
	Route::get('/',['as'=>'admin','middleware'=>'auth','uses'=>'AdminController@index']);		
	Route::group(['prefix'=>'cate'],function(){
		Route::get('list',['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
		Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
		Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);
	});
	Route::group(['prefix'=>'product'],function(){
		Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
		Route::get('list',['as'=>'admin.product.getList','uses'=>'ProductController@getList']);
		Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
		Route::post('delimg/{id}',['as'=>'admin.product.postDelImg','uses'=>'ProductController@postDelImg']);
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);
		Route::get('list',['as'=>'admin.user.getList','uses'=>'UserController@getList']); 
		Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);		
	});
});

//===== Auth ====
Route::auth();
Route::get('login','Auth\AuthController@showLoginForm');
Route::post('login','Auth\AuthController@postLogin');

//===== User ====
Route::get('/', 'HomeController@index');
Route::get('/loai-san-pham/{id}/{tenloai?}', ['as'=>'loaisanpham','uses'=>'HomeController@loaisanpham']);
Route::get('/chi-tiet-san-pham/{id}/{tenloai}', ['as'=>'chitietsanpham','uses'=>'HomeController@chitietsanpham']);
Route::get('lien-he',['as'=>'getLienhe','uses'=>'HomeController@getLienhe']);
Route::post('lien-he',['as'=>'postLienhe','uses'=>'HomeController@postLienhe']);
Route::get('mua-hang/{id}/{tenloai}',['as'=>'getMuahang','uses'=>'HomeController@getMuahang']);
Route::get('gio-hang',['as'=>'getGiohang','uses'=>'HomeController@getGiohang']);
Route::get('xoa-san-pham/{id}',['as'=>'getXoaSanpham','uses'=>'HomeController@getXoaSanpham']);
Route::get('cap-nhat-gio-hang/{id}/{qty}',['as'=>'postCapNhatGioHang','uses'=>'HomeController@postCapNhatGioHang']);
//===== Error =====