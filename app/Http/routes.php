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
        return view('backends/login');
    });
    Route::get('logout', function () {
        Session::forget('logged_in');
        //Session::flush();
        return redirect('admin/login');
    });

    Route::get('{url}', 'BackendController@checkUrl');

    Route::post('login', 'ModelBackendController@doLogin');
});