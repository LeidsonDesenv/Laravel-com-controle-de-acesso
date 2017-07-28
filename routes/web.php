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

Route::get('/', function () {
    return view('layouts/app');
});

Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('update/{id}', 'HomeController@update');
    
    //notice routes
    Route::group(['namespace' => 'Notices'], function()
    {
        Route::get('notices/{num}', 'NoticesController@index')->name('notices');
        Route::get('geranotices', 'NoticesController@make');
    });
    
    //user routes
    Route::group(['namespace' => 'Users'], function()
    {
        Route::get('allusers' , 'UsersController@index')->name('allusers');
    });

    //Roles routes    
    Route::get('allroles', 'Roles\RolesController@index')->name('allroles');
    
    //permission routes
    Route::get('allpermissions', 'Permissions\PermissionsController@index')->name('allpermissions');
