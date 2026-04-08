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
            Route::put('store', ['as' => 'update', 'uses' => 'OrderController@store']);
        });

        /* Setting */
        Route::group(['prefix' => 'setting', 'as' => 'setting.'], function() {
            Route::get('index', ['as' => 'index', 'uses' => 'SettingController@index']);
            Route::post('store', ['as' => 'store', 'uses' => 'SettingController@store']);

            /* Lang */
            Route::group(['prefix' => 'lang', 'as' => 'lang.'], function() {
                Route::get('index', ['as' => 'index', 'uses' => 'LangController@index']);
                Route::post('store', ['as' => 'store', 'uses' => 'LangController@store']);
                Route::put('store', ['as' => 'update', 'uses' => 'LangController@store']);
                Route::get('delete', ['as' => 'delete', 'uses' => 'LangController@delete']);
            });
            
            /* Logo */
            Route::group(['prefix' => 'logo', 'as' => 'logo.'], function() {
                Route::get('index', ['as' => 'index', 'uses' => 'LogoController@index']);
                Route::get('create', ['as' => 'create', 'uses' => 'LogoController@create']);
                Route::post('store', ['as' => 'store', 'uses' => 'LogoController@store']);
                Route::put('store', ['as' => 'update', 'uses' => 'LogoController@store']);
                Route::get('delete', ['as' => 'delete', 'uses' => 'LogoController@delete']);
            });

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
});