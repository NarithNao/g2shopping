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
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('frontends.index');
});

Route::get('{url}', 'FrontendController@checkUrl');

Route::group(['prefix' => 'admin'], function () {

    Route::get('login', function () {
        if(Session::has('logged_in')){
            //print_r(Session::get('logged_in'));
            return redirect('admin/dashboard');
        }
        return view('backends/login');
    });
    Route::get('logout', function () {
        Session::forget('logged_in');
        //Session::flush();
        return redirect('admin/login');
    });

    Route::get('{url}', 'BackendController@checkUrl');

    Route::post('login', 'ModelBackendController@doLogin');

    Route::post('add_user_role', 'ModelBackendController@addUserRole');
    Route::get('user_role/{id}/search', 'ModelBackendController@searchUserRole');
    Route::post('update_user_role', 'ModelBackendController@updateUserRole');
    Route::post('delete_user_role', 'ModelBackendController@deleteUserRole');

    Route::post('add_user', 'ModelBackendController@addUser');
    Route::get('user/{id}/search', 'ModelBackendController@searchUser');
    Route::post('update_user', 'ModelBackendController@updateUser');
    Route::post('update_user_info', 'ModelBackendController@updateUserInfo');

    Route::get('category/list', 'ModelBackendController@listCategory');
    Route::post('add_category', 'ModelBackendController@addCategory');
    Route::post('add_category_image', 'ModelBackendController@addCategoryImage');
    Route::get('category/{id}/search', 'ModelBackendController@searchCategory');
    Route::post('delete_category', 'ModelBackendController@deleteCategory');
});