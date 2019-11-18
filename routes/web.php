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
//frontend.............
Route::get('/','HomeController@index');







//backend.............................
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/dashboard','AdminController@dashboard');
Route::get('/logout','AdminController@admin_logout');

//add category related route
Route::get('/add-category','AdminController@add_category');
Route::get('/all-category','AdminController@all_category');
Route::post('/save-category','AdminController@save_category');
Route::get('/unactive_category/{category_id}','AdminController@unactive_category');
Route::get('/active_category/{category_id}','AdminController@active_category');
Route::get('/edit_category/{category_id}','AdminController@edit_category');
Route::post('/update_category/{category_id}','AdminController@update_category');
Route::get('/delete_category/{category_id}','AdminController@delete_category');

//manufacture or brands
Route::get('/add-manufacture','AdminController@add_manufacture');
Route::post('/save-manufacture','AdminController@save_manufacture');
Route::get('/all-manufacture','AdminController@all_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}','AdminController@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}','AdminController@active_manufacture');
Route::get('/edit_manufacture/{manufacture_id}','AdminController@edit_manufacture');
Route::post('/update_manufacture/{manufacture_id}','AdminController@update_manufacture');
Route::get('/delete_manufacture/{manufacture_id}','AdminController@delete_manufacture');

//add products
Route::get('add_product','AdminController@add_product');
Route::post('/save-product','AdminController@save_product');
Route::get('/all_product','AdminController@all_product');
Route::get('/unactive_product/{product_id}','AdminController@unactive_product');
Route::get('/active_product/{product_id}','AdminController@active_product');
Route::get('/edit_product/{product_id}','AdminController@edit_product');
Route::post('/update_product/{product_id}','AdminController@update_product');
Route::get('/delete_product/{product_id}','AdminController@delete_product');
