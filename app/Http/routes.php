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

    /*
     * AJAX request
     */

    /* user role */
    Route::get('list_user_role', 'Backend\UserTypeCtrl@listUserRole');
    Route::get('list_user_role_active', 'Backend\UserTypeCtrl@listUserRoleActive');
    Route::post('add_user_role', 'Backend\UserTypeCtrl@addUserRole');
    Route::get('user_role/{id}/search', 'Backend\UserTypeCtrl@searchUserRole');
    Route::post('update_user_role', 'Backend\UserTypeCtrl@updateUserRole');

    /* user */
    Route::get('list_user', 'Backend\UserCtrl@listUser');
    Route::post('add_user', 'Backend\UserCtrl@addUser');
    Route::get('user/{id}/search', 'Backend\UserCtrl@searchUser');
    Route::post('update_user', 'Backend\UserCtrl@updateUser');
    Route::post('update_user_info', 'Backend\UserCtrl@updateUserInfo');

    /* product */
    Route::get('category/list', 'Backend\CategoryCtrl@listCategory');
    Route::post('add_category', 'Backend\CategoryCtrl@addCategory');
    Route::post('add_category_image', 'Backend\CategoryCtrl@addCategoryImage');
    Route::get('category/{id}/search', 'Backend\CategoryCtrl@searchCategory');
    Route::post('category/list_update', 'Backend\CategoryCtrl@listCategoryUpdate');
    Route::post('update_category', 'Backend\CategoryCtrl@updateCategory');
    Route::post('update_category_image', 'Backend\CategoryCtrl@updateCategoryImage');

    /* brand */
    Route::post('add_brand', 'Backend\BrandCtrl@addBrand');
    Route::post('add_brand_image', 'Backend\BrandCtrl@addBrandImage');
    Route::get('brand/{id}/search', 'Backend\BrandCtrl@searchBrand');
    Route::post('update_brand', 'Backend\BrandCtrl@updateBrand');
    Route::post('update_brand_image', 'Backend\BrandCtrl@updateBrandImage');

    /*
     * HTTP request
     */
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

    Route::get('{url}', 'BackendController@checkUrl');

});