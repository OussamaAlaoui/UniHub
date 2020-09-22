<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();
Route::get('/','PagesController@welcome')->name('welcome');


Route::get('/register','RegisterController@register')->name('register');
Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('report', 'ReportController');
Route::get('/files/create', 'DocumentController@create');
Route::post('/files', 'DocumentController@store');
Route::get('/files/download/{file}', 'DocumentController@download');

Route::post('/profile','UserController@update_photo'); 
Route::get('/profile','UserController@profile')->name('profile');
Route::post('/create_group','AdminController@create_groups');
Route::get('/create_group','AdminController@groups')->name('groups');
Route::get('/message/{id}','PagesController@getMessage')->name('Message');
Route::post('message','PagesController@sendMessage');
Route::get('/Modify_group','MgroupsController@mgroups')->name('mgroups');
Route::post('/Modify_group','MgroupsController@modify_groups');
Route::get('/groupe/{id}', 'GroupController@index')->name('groupe'); 
Route::post('/groupe', 'GroupController@sendMessageGroupe')->name('groupe'); 
Route::get('group_setting','GroupSettingController@index')->name('Groups_Setting');
Route::get('/addusers','NewUserController@newuser')->name("addusers");
Route::get('/addadmin','NewAdminController@index')->name("addadmin");
Route::post('/addadmin','NewAdminController@create');
Route::get('/create_t','NewTeacherController@teacher')->name("create_t");
Route::post('/create_t','NewTeacherController@create_t')->name("create_t");
Route::get('/modify_statut','ModifyStuentController@index')->name("modify_statut");
Route::post('/modify_statut','ModifyStuentController@modify')->name("modify_statut");

Route::get('/order', 'OrderController@index')->name('order');
Route::post('/order', 'OrderController@order')->name('order');
Route::get('/admin_order', 'Admin_Order_Controller@index')->name('Admin_order');
Route::post('/admin_order', 'Admin_Order_Controller@Process_Order')->name('Process_Order');
Route::get('/activate_user', 'ActivationController@index')->name('active');
Route::post('/activate_user', 'ActivationController@activate')->name('active');
