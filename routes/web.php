<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

# ADMIN
Route::group(['prefix' => 'hadmin', 'namespace' => 'Admin'], function() {

    Route::get('/', 'AuthController@login');
    
    Route::get('login', ['as' => 'get.login', 'uses' => 'AuthController@login']);
    Route::post('login', ['as' => 'post.login', 'uses' => 'AuthController@login']);    
    Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

    Route::middleware(['CheckAdminLogin', 'CheckRole', 'Locale'])->group(function() {
        Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

        /* Admin */
        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
            Route::get('index', ['as' => 'index', 'uses' => 'AdminController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'AdminController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'AdminController@store']);
            Route::put('store', ['as' => 'update', 'uses' => 'AdminController@store']);
            Route::get('delete', ['as' => 'delete', 'uses' => 'AdminController@delete']);

            Route::get('profile', ['as' => 'profile', 'uses' => 'AdminController@profile']);
            Route::post('profile', ['as' => 'updateProfile', 'uses' => 'AdminController@profile']);

            Route::get('list', ['as' => 'list', 'uses' => 'AdminController@list']);

            /* Role */
            Route::group(['prefix' => 'role', 'as' => 'role.'], function() {
                Route::get('index', ['as' => 'index', 'uses' => 'RoleController@index']);
                Route::get('create', ['as' => 'create', 'uses' => 'RoleController@create']);
                Route::post('store', ['as' => 'store', 'uses' => 'RoleController@store']);
                Route::put('store', ['as' => 'update', 'uses' => 'RoleController@store']);
                Route::get('delete', ['as' => 'delete', 'uses' => 'RoleController@delete']);
            });
        });

        /* User */
        Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
            Route::get('index', ['as' => 'index', 'uses' => 'UserController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'UserController@store']);
            Route::put('store', ['as' => 'update', 'uses' => 'UserController@store']);
            Route::get('delete', ['as' => 'delete', 'uses' => 'UserController@delete']);
        });

        /* Course */
        Route::group(['prefix' => 'course', 'as' => 'course.'], function() {
            Route::get('index', ['as' => 'index', 'uses' => 'CourseController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'CourseController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'CourseController@store']);
            Route::put('store', ['as' => 'update', 'uses' => 'CourseController@store']);
            Route::get('delete', ['as' => 'delete', 'uses' => 'CourseController@delete']);
            Route::post('sort', ['as' => 'sort', 'uses' => 'CourseController@sort']);
        });

        /* Order */
        Route::group(['prefix' => 'order', 'as' => 'order.'], function() {
            Route::get('index', ['as' => 'index', 'uses' => 'OrderController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'OrderController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'OrderController@store']);
            Route::post('update', ['as' => 'update', 'uses' => 'OrderController@update']);
            Route::post('mail', ['as' => 'mail', 'uses' => 'OrderController@mail']);
            Route::get('pdf', ['as' => 'pdf', 'uses' => 'OrderController@pdf']);
            Route::get('preview', ['as' => 'preview', 'uses' => 'OrderController@preview']);
            Route::post('export', ['as' => 'export', 'uses' => 'OrderController@export']);
            Route::get('delete', ['as' => 'delete', 'uses' => 'OrderController@delete']);
            Route::get('status', ['as' => 'status', 'uses' => 'OrderController@status']);
        });

        /* Mail */
        Route::group(['prefix' => 'mail', 'as' => 'mail.'], function() {
            Route::get('index', ['as' => 'index', 'uses' => 'MailController@index']);
            Route::get('create', ['as' => 'create', 'uses' => 'MailController@create']);
            Route::post('store', ['as' => 'store', 'uses' => 'MailController@store']);
            Route::put('store', ['as' => 'update', 'uses' => 'MailController@store']);
            Route::get('delete', ['as' => 'delete', 'uses' => 'MailController@delete']);
            Route::get('preview', ['as' => 'preview', 'uses' => 'MailController@preview']);

            Route::get('send', ['as' => 'send', 'uses' => 'MailController@send']);
            Route::post('send', ['as' => 'send', 'uses' => 'MailController@send']);
            Route::get('activity', ['as' => 'activity', 'uses' => 'MailController@activity']);
            Route::get('detail', ['as' => 'detail', 'uses' => 'MailController@detail']);
        });

        /* Setting */
        Route::group(['prefix' => 'setting', 'as' => 'setting.'], function() {
            Route::get('index', ['as' => 'index', 'uses' => 'SettingController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'SettingController@store']);
        });

    });

    Route::get('403', function(){
        return view('admin.403');
    })->name('403');
});

Route::group(['namespace' => 'Index', 'as' => 'index.', 'middleware' => ['Locale', 'Maintenance']], function() {
    Route::get('', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::post('register', ['as' => 'register', 'uses' => 'HomeController@register']);

    Route::get('thanh-toan', ['as' => 'purchase', 'uses' => 'HomeController@purchase']);
    Route::get('order', ['as' => 'order', 'uses' => 'HomeController@order']);
    Route::get('opening', ['as' => 'opening', 'uses' => 'HomeController@opening']);
});