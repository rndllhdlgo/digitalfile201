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

// Routes for web pages
// Route::any('/home','PagesController@home');
Route::any('/employees', 'PagesController@employees');
Route::any('/memos', 'PagesController@memos');
Route::any('/evaluation', 'PagesController@evaluation');
Route::any('/contracts', 'PagesController@contracts');
Route::any('/users', 'PagesController@users');
Route::any('/maintenance', 'PagesController@maintenance');

// Routes for Employees Controller
Route::any('/employees/listOfEmployees','EmployeesController@listOfEmployees');//To display data table of list of employees
Route::any('/employees/save','EmployeesController@save');//To save single data into data base
Route::any('/employees/insertImage','EmployeesController@insertImage');//To save single data into data base
Route::any('/employees/fetch','EmployeesController@fetch');//For Fetch data, based on id
Route::any('/employees/update','EmployeesController@update');//For Update Data
Route::any('/employees/insert', 'EmployeesController@insert');//To insert multiple data(route)

//Routes for Checking Duplication
Route::get('/employees/checkDuplicate', 'EmployeesController@checkDuplicate');
Route::get('/employees/checkEmailDuplicate', 'EmployeesController@checkEmailDuplicate');
Route::get('/employees/checkTelephoneNumberDuplicate', 'EmployeesController@checkTelephoneNumberDuplicate');
Route::get('/employees/checkCellphoneNumberDuplicate', 'EmployeesController@checkCellphoneNumberDuplicate');
Route::get('/employees/checkFatherCellphoneNumberDuplicate', 'EmployeesController@checkFatherCellphoneNumberDuplicate');
Route::get('/employees/checkMotherCellphoneNumberDuplicate', 'EmployeesController@checkMotherCellphoneNumberDuplicate');
Route::get('/employees/checkSpouseCellphoneNumberDuplicate', 'EmployeesController@checkSpouseCellphoneNumberDuplicate');
Route::get('/employees/checkEmergencyContactNumberDuplicate', 'EmployeesController@checkEmergencyContactNumberDuplicate');
Route::get('/employees/checkEmployeeEmailAddressDuplicate', 'EmployeesController@checkEmployeeEmailAddressDuplicate');
Route::get('/employees/checkEmployeeContactNumberDuplicate', 'EmployeesController@checkEmployeeContactNumberDuplicate');

//Routes for Fetching DataTables
Route::any('/employees/childrenDataTable','EmployeesController@childrenDataTable');
Route::any('/employees/collegeDataTable','EmployeesController@collegeDataTable');//For Fetch data route

//Routes for users tab
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

// Routes Select Region
Route::get('/setcity','PagesController@setcity');
Route::get('/setprovince','PagesController@setprovince');

// Route::resource('document','DocumentuploadController');
Route::any('/employees/storeRequirements','EmployeesController@storeRequirements');

// Routes for saving multiple tables
Route::any('/employees/childrenSave','EmployeesController@childrenSave');
Route::any('/employees/collegeSave','EmployeesController@collegeSave');
Route::any('/employees/trainingSave','EmployeesController@trainingSave');
Route::any('/employees/vocationalSave','EmployeesController@vocationalSave');
Route::any('/employees/jobSave','EmployeesController@jobSave');
Route::any('/employees/memoSave','EmployeesController@memoSave');
Route::any('/employees/evaluationSave','EmployeesController@evaluationSave');
Route::any('/employees/contractsSave','EmployeesController@contractsSave');
Route::any('/employees/resignationSave','EmployeesController@resignationSave');
Route::any('/employees/terminationSave','EmployeesController@terminationSave');

// Random Routes
// Route::get('/upload', function () {
//     return view('uploadfile');
// });
// Route::resource('fileupload', 'FileuploadController');

Route::get('/multiupload',function(){
    return view('multiUploadFile');
});

Route::post('/multiupload','MultiFileUploadController@filesUpload');