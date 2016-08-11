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
    return redirect('index');
});

Route::get('{url}', 'FrontendController@checkUrl');

Route::group(['prefix' => 'admin'], function () {

    Route::get('login', function () {
        $user_type = \App\UserType::all();
        $user = \App\User::all();
        if(count($user_type) < 1  && count($user) < 1){
            \App\UserType::create([
                'role' => 'Admin',
                'description' => 'Super user'
            ]);
            \App\User::create([
                'user_type_id' => 1,
                'username' => 'Narith',
                'email' => 'narithnao@gmail.com',
                'password' => 'narith'
            ]);
        }
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

    Route::post('login', 'ModelBackendController@doLogin');

    Route::get('list_user_role', 'ModelBackendController@listUserRole');
    Route::get('list_user_role_active', 'ModelBackendController@listUserRoleActive');
    Route::post('add_user_role', 'ModelBackendController@addUserRole');
    Route::get('user_role/{id}/search', 'ModelBackendController@searchUserRole');
    Route::post('update_user_role', 'ModelBackendController@updateUserRole');
    Route::post('delete_user_role', 'ModelBackendController@deleteUserRole');

    Route::get('list_user', 'ModelBackendController@listUser');
    Route::post('add_user', 'ModelBackendController@addUser');
    Route::get('user/{id}/search', 'ModelBackendController@searchUser');
    Route::post('update_user', 'ModelBackendController@updateUser');
    Route::post('update_user_info', 'ModelBackendController@updateUserInfo');

    Route::get('category/list', 'ModelBackendController@listCategory');
    Route::post('add_category', 'ModelBackendController@addCategory');
    Route::post('add_category_image', 'ModelBackendController@addCategoryImage');
    Route::get('category/{id}/search', 'ModelBackendController@searchCategory');
    Route::post('category/list_update', 'ModelBackendController@listCategoryUpdate');
    Route::post('update_category', 'ModelBackendController@updateCategory');
    Route::post('update_category_image', 'ModelBackendController@updateCategoryImage');

    Route::post('add_brand', 'ModelBackendController@addBrand');
    Route::post('add_brand_image', 'ModelBackendController@addBrandImage');
    Route::get('brand/{id}/search', 'ModelBackendController@searchBrand');
    Route::post('update_brand', 'ModelBackendController@updateBrand');
    Route::post('update_brand_image', 'ModelBackendController@updateBrandImage');

    Route::get('{url}', 'BackendController@checkUrl');

});