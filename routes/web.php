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

Route::group(['namespace' => 'Admin'], function() {

    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');    
    
    Route::group(['middleware' => ['auth']], function () {
        Route::group(['prefix' => 'auth'], function(){
            Route::get('/profile',[
                'uses'	=> 'AuthController@profile',
                'as'	=> 'auth_profile'
            ]);
            Route::get('/profile_edit',[
                'uses'	=> 'AuthController@profile_edit',
                'as'	=> 'auth_profile_edit'
            ]);
            Route::post('/profile_edit',[
                'uses'	=> 'AuthController@profile_edit',
                'as'	=> 'auth_profile_update'
            ]);
            Route::get('/change_password',[
                'uses'	=> 'AuthController@change_password',
                'as'	=> 'auth_change_password'
            ]);
            Route::post('/change_password',[
                'uses'	=> 'AuthController@change_password',
                'as'	=> 'auth_change_password_update'
            ]);
    
        });
    
        // {domain_name}/users/* routes
        Route::resource('users', 'UsersController');
        Route::get('/users/datatables/get/data', [
          'uses' => 'UsersController@data',
          'as' => 'users.data'
        ]);
        Route::get('/users/change-password/{id}',[
            'uses'	=> 'UsersController@change_password',
            'as'	=> 'users.change_password'
          ]);
        Route::post('/users/change-password/{id}',[
          'uses'	=> 'UsersController@change_password_update',
          'as'	=> 'users.change_password_update'
        ]);
    

    });
    

});

