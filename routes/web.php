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
Route::get('/', 'HomeController@login')->name('login');

Route::get('/logout', 'HomeController@logout')->name('logout');
Route::post('/check_login', 'HomeController@check_login');
Route::group(['prefix' => 'admin',  'middleware' => 'auth:web'], function(){
    Route::get('systemDashboard','Admin\HomeController@systemDashboard')->name('system.dashboard');
    //profile part
    Route::get('profile','Admin\ProfileController@index');
    Route::post('updateProfile','Admin\ProfileController@updateProfile');
    Route::post('changePassword','Admin\ProfileController@changePassword');
    //===========================
    Route::resource('admins','Admin\AdminsController');
    Route::resource('customers','Admin\CustomersController');
    Route::resource('projects','Admin\ProjectsController');
    Route::resource('emails','Admin\EmailsController');
    Route::post('check_in','Admin\CheckListsController@check_in');
    Route::get('check_out/{id}','Admin\CheckListsController@check_out');
    Route::post('do_check_out','Admin\CheckListsController@do_check_out');
    Route::get('my_reports','Admin\CheckListsController@my_reports');
    Route::get('engineer_report_details/{id}/{engineer_id}','Admin\CheckListsController@engineer_report_details');
    Route::get('admin_report_details/{id}','Admin\CheckListsController@admin_report_details');
    Route::get('engineer_reports','Admin\EngineerReportsController@engineer_reports');
    Route::get('CustomerDetails/{id}','Admin\CustomersController@CustomerDetails');
    Route::get('admin_check_out/{id}','Admin\CheckListsController@admin_check_out');
    Route::post('do_admin_check_out','Admin\CheckListsController@do_admin_check_out');
    Route::get('generate_report','Admin\EngineerReportsController@generate_report');
    Route::post('do_generate_report','Admin\EngineerReportsController@do_generate_report');
    Route::get('project_report','Admin\ProjectsController@generate_report');
    Route::post('generate_project_report','Admin\ProjectsController@generate_project_report');
    Route::get('projects_report','Admin\ProjectsController@projects_report');
    Route::get('toggle_check','Admin\ManualCheckController@toggle_check');
    Route::get('toggleCheck/{id}/{type}','Admin\ManualCheckController@toggleCheck');
    Route::get('checkIn_manually','Admin\CheckListsController@checkIn_manually');
    Route::post('do_manually_checkin','Admin\CheckListsController@do_manually_checkin');
    
});

    Route::get('admin/get_alerts','Admin\EngineerReportsController@get_alerts');
    
