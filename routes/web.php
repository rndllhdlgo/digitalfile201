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

// Route::any('/home','PagesController@home');
Route::any('/employees', 'PagesController@employees');
Route::any('/memos', 'PagesController@memos');
Route::any('/evaluation', 'PagesController@evaluation');
Route::any('/contracts', 'PagesController@contracts');
Route::any('/users', 'PagesController@users');

Route::any('/employees/listOfEmployees','EmployeesController@listOfEmployees');//To display data table of list of employees
Route::any('/employees/save','EmployeesController@save');//To save single data into data base
Route::any('/employees/insertImage','EmployeesController@insertImage');//To save single data into data base
Route::any('/employees/insertFile', 'EmployeesController@insertFile');//To insert file (route)
// Route::any('/employees/insert','EmployeesController@insert');//For inserting multiple data into database
Route::any('/employees/fetch','EmployeesController@fetch');//For Fetch data, based on id
Route::any('/employees/collegeDataTable','EmployeesController@collegeDataTable');//For Fetch data route
Route::any('/employees/vocationalDataTable','EmployeesController@vocationalDataTable');
Route::any('/employees/trainingsDataTable','EmployeesController@trainingsDataTable');
Route::any('/employees/jobDataTable','EmployeesController@jobDataTable');
Route::any('/employees/memosDataTable','EmployeesController@memosDataTable');
Route::any('/employees/evaluationDataTable','EmployeesController@evaluationDataTable');
Route::any('/employees/contractsDataTable','EmployeesController@contractsDataTable');
Route::any('/employees/resignationDataTable','EmployeesController@resignationDataTable');
Route::any('/employees/terminationDataTable','EmployeesController@terminationDataTable');
Route::any('/employees/update','EmployeesController@update');
Route::any('/employees/insert', 'EmployeesController@insert');//To insert multiple data(route)

Route::get('/employees/checkDuplicate', 'EmployeesController@checkDuplicate');

Route::any('/users/listOfUsers','UsersController@listOfUsers');
Route::any('/users/saveUser','UsersController@saveUser');
Route::any('/users/updateUser','UsersController@updateUser');

//Authentication Routes
// Auth::routes();
Auth::routes(['register' => false, 'verify' => false, 'confirm' => false]);
Route::get('/logout',[LoginController::class,'logout']);

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
