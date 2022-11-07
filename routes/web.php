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

// Random Routes
// Route::get('/upload', function () {
//     return view('uploadfile');
// });
// Route::resource('fileupload', 'FileuploadController');

// Route::get('/multiupload',function(){
//     return view('multiUploadFile');
// });

// Route::post('/multiupload','MultiFileUploadController@filesUpload');

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
Route::any('/employees/save','EmployeesController@save');
Route::any('/employees/insertImage','EmployeesController@insertImage');
Route::any('/employees/fetch','EmployeesController@fetch');
Route::any('/employees/update','EmployeesController@update');
Route::any('/employees/insert', 'EmployeesController@insert');

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
Auth::routes(['register' => false, 'verify' => false, 'confirm' => false]);
Route::get('/logout',[LoginController::class,'logout']);
Route::get('/', 'HomeController@index');

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

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

//Route for home page
Route::get('/index/data','PagesController@index_data');

// Routes for maintenance
Route::get('/maintenance/companyData','MaintenanceController@companyData');
Route::any('/maintenance/companySave','MaintenanceController@companySave');
Route::any('/maintenance/companyUpdate','MaintenanceController@companyUpdate');
// Route::get('/maintenance/companyFetch','MaintenanceController@companyFetch');

Route::any('/maintenance/branchData','MaintenanceController@branchData');
Route::any('/maintenance/branchSave','MaintenanceController@branchSave');
Route::any('/maintenance/branchUpdate','MaintenanceController@branchUpdate');

Route::any('/maintenance/supervisorData','MaintenanceController@supervisorData');
Route::any('/maintenance/supervisorSave','MaintenanceController@supervisorSave');
Route::any('/maintenance/supervisorUpdate','MaintenanceController@supervisorUpdate');

Route::any('/maintenance/shiftData','MaintenanceController@shiftData');
Route::any('/maintenance/shiftSave','MaintenanceController@shiftSave');
