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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'auth'], function(){
        // Route::get('/datatables/users', [
        //     'uses' 	=> 'UsersController@getUserDatatable',
        //     'as'	=> 'datatables.users'
        // ]);

        // Route::get('/', [
        //     'uses'	=> 'UsersController@admin_index',
        //     'as'	=> 'user_index',
        //     'trx'			=> 'UsersController',
        //     'trx_action'	=> 'user_index'
        // ]);
        // Route::get('/create',[
        //     'uses'	=> 'UsersController@admin_create',
        //     'as'	=> 'user_create',
        //     'trx'			=> 'UsersController',
        //     'trx_action'	=> 'user_create'
        // ]);
        // Route::post('/create', [
        //     'uses' 	=> 'UsersController@admin_store',
        //     'as' 	=> 'user_store',
        //     'trx'			=> 'UsersController',
        //     'trx_action'	=> 'user_create'
        // ]);
        // Route::get('/edit/{id}', [
        //     'uses' 	=> 'UsersController@admin_edit',
        //     'as'	=> 'user_edit',
        //     'trx'			=> 'UsersController',
        //     'trx_action'	=> 'user_edit'
        // ]);
        // Route::post('/edit/{id}', [
        //     'uses'	=> 'UsersController@admin_update',
        //     'as'	=> 'user_update',

        //     'trx'			=> 'UsersController',
        //     'trx_action'	=> 'user_edit'
        // ]);
        // Route::post('/delete', [
        //     'uses'	=> 'UsersController@admin_destroy',
        //     'as'	=> 'user_delete',

        //     'trx'			=> 'UsersController',
        //     'trx_action'	=> 'user_delete'
        // ]);
        // Route::get('/view',[
        //     'uses'	=> 'UsersController@admin_view',
        //     'as'	=> 'user_view'
        // ]);
        Route::get('/profile',[
            'uses'	=> 'UsersController@profile',
            'as'	=> 'auth_profile'
        ]);
        Route::get('/profile_edit',[
            'uses'	=> 'UsersController@profile_edit',
            'as'	=> 'auth_profile_edit'
        ]);
        Route::post('/profile_edit',[
            'uses'	=> 'UsersController@profile_edit',
            'as'	=> 'auth_profile_update'
        ]);
        Route::get('/change_password',[
            'uses'	=> 'UsersController@change_password',
            'as'	=> 'auth_change_password'
        ]);
        Route::post('/change_password',[
            'uses'	=> 'UsersController@change_password',
            'as'	=> 'auth_change_password_update'
        ]);

    });
});
