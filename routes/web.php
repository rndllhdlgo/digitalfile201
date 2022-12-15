<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DonutController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DonutSalesController;
use App\Http\Controllers\SalesMonthly;

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

//Authentication Routes
Auth::routes(['register' => false, 'verify' => false, 'confirm' => false]);
Route::get('/logout',[LoginController::class,'logout']);
Route::get('/', 'HomeController@index');

// Pages Controller
Route::any('/employees', 'PagesController@employees');
Route::any('/memos', 'PagesController@memos');
Route::any('/evaluation', 'PagesController@evaluation');
Route::any('/contracts', 'PagesController@contracts');
Route::any('/users', 'PagesController@users');
Route::any('/maintenance', 'PagesController@maintenance');

Route::get('/setcity','PagesController@setcity');
Route::get('/setprovince','PagesController@setprovince');

Route::get('/index/data','PagesController@index_data');

Route::any('/setJobPosition','PagesController@setJobPosition');
Route::any('/setJobDescription','PagesController@setJobDescription');

// Employees Controller
Route::any('/employees/listOfEmployees','EmployeesController@listOfEmployees');
Route::any('/employees/insertImage','EmployeesController@insertImage');

Route::any('/employees/savePersonalInformation','EmployeesController@savePersonalInformation');
Route::any('/employees/saveWorkInformation','EmployeesController@saveWorkInformation');
Route::any('/employees/saveCompensationBenefits','EmployeesController@saveCompensationBenefits');
Route::any('/employees/saveEducationalAttainment','EmployeesController@saveEducationalAttainment');
Route::any('/employees/saveMedicalHistory','EmployeesController@saveMedicalHistory');

Route::any('/employees/saveCollege','EmployeesController@saveCollege');
Route::any('/employees/saveTraining','EmployeesController@saveTraining');
Route::any('/employees/saveVocational','EmployeesController@saveVocational');
Route::any('/employees/saveJobHistory','EmployeesController@saveJobHistory');
Route::any('/employees/saveChildren','EmployeesController@saveChildren');

Route::any('/employees/checkDuplicate', 'EmployeesController@checkDuplicate');
Route::any('/employees/checkEmailDuplicate', 'EmployeesController@checkEmailDuplicate');
Route::any('/employees/checkTelephoneNumberDuplicate', 'EmployeesController@checkTelephoneNumberDuplicate');
Route::any('/employees/checkCellphoneNumberDuplicate', 'EmployeesController@checkCellphoneNumberDuplicate');
Route::any('/employees/checkFatherCellphoneNumberDuplicate', 'EmployeesController@checkFatherCellphoneNumberDuplicate');
Route::any('/employees/checkMotherCellphoneNumberDuplicate', 'EmployeesController@checkMotherCellphoneNumberDuplicate');
Route::any('/employees/checkSpouseCellphoneNumberDuplicate', 'EmployeesController@checkSpouseCellphoneNumberDuplicate');
Route::any('/employees/checkEmergencyContactNumberDuplicate', 'EmployeesController@checkEmergencyContactNumberDuplicate');
Route::any('/employees/checkEmployeeEmailAddressDuplicate', 'EmployeesController@checkEmployeeEmailAddressDuplicate');
Route::any('/employees/checkEmployeeContactNumberDuplicate', 'EmployeesController@checkEmployeeContactNumberDuplicate');

Route::any('/employees/childrenDataTable','EmployeesController@childrenDataTable');
Route::any('/employees/collegeDataTable','EmployeesController@collegeDataTable');

Route::any('/employees/saveDocuments','EmployeesController@saveDocuments');

// Users Controller
Route::any('/users/listOfUsers','UsersController@listOfUsers');
Route::any('/users/saveUser','UsersController@saveUser');
Route::any('/users/updateUser','UsersController@updateUser');

// Maintenance Controller
Route::get('/maintenance/companyData','MaintenanceController@companyData');
Route::any('/maintenance/companySave','MaintenanceController@companySave');
Route::any('/maintenance/companyUpdate','MaintenanceController@companyUpdate');

Route::any('/maintenance/branchData','MaintenanceController@branchData');
Route::any('/maintenance/branchSave','MaintenanceController@branchSave');
Route::any('/maintenance/branchUpdate','MaintenanceController@branchUpdate');

Route::any('/maintenance/supervisorData','MaintenanceController@supervisorData');
Route::any('/maintenance/supervisorSave','MaintenanceController@supervisorSave');
Route::any('/maintenance/supervisorUpdate','MaintenanceController@supervisorUpdate');

Route::any('/maintenance/shiftData','MaintenanceController@shiftData');
Route::any('/maintenance/shiftSave','MaintenanceController@shiftSave');
Route::any('/maintenance/shiftUpdate','MaintenanceController@shiftUpdate');

Route::any('/maintenance/jobPositionData','MaintenanceController@jobPositionData');
Route::any('/maintenance/jobPositionSave','MaintenanceController@jobPositionSave');
Route::any('/maintenance/jobPositionUpdate','MaintenanceController@jobPositionUpdate');

Route::any('/maintenance/jobPositionAndDescriptionData','MaintenanceController@jobPositionAndDescriptionData');
Route::any('/maintenance/jobPositionAndDescriptionSave','MaintenanceController@jobPositionAndDescriptionSave');
Route::any('/maintenance/jobPositionAndDescriptionUpdate','MaintenanceController@jobPositionAndDescriptionUpdate');

Route::any('/maintenance/jobDescriptionData','MaintenanceController@jobDescriptionData');
Route::any('/maintenance/jobDescriptionSave','MaintenanceController@jobDescriptionSave');
Route::any('/maintenance/jobDescriptionUpdate','MaintenanceController@jobDescriptionUpdate');
