<?php


use Illuminate\Support\Facades\Route;

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
Route::get('login','CompanyController@index');
Route::post('logout','CompanyController@index');
Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'dashboard','namespace' => 'App\Http\Controllers'],function(){

    Route::get('/companys/create','CompanyController@create');
    Route::get('/settings/edit/{leaveSettings}','LeaveSettingsController@edit');
    Route::put('/settings/{leaveSettings}','LeaveSettingsController@update');

    Route::get('/departments','DepartmentsController@index');
    Route::post('/departments','DepartmentsController@store');
    Route::get('/departments/create','DepartmentsController@create');
    Route::get('/departments/edit/{department}','DepartmentsController@edit');
    Route::put('/departments/{department}','DepartmentsController@update');
    Route::delete('/departments/{department}','DepartmentsController@destroy');

    //Route::get('/employees','EmployeeDetailsController@index');
    Route::resource('employees', EmployeeDetailsController::class);
});
