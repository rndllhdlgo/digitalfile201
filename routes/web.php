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

Route::any('/employees/fetch','EmployeesController@employeeFetch');

Route::any('/employees/savePersonalInformation','EmployeesController@savePersonalInformation');
Route::any('/employees/saveWorkInformation','EmployeesController@saveWorkInformation');
Route::any('/employees/saveCompensationBenefits','EmployeesController@saveCompensationBenefits');
Route::any('/employees/saveEducationalAttainment','EmployeesController@saveEducationalAttainment');
Route::any('/employees/saveMedicalHistory','EmployeesController@saveMedicalHistory');

Route::any('/employees/updatePersonalInformation','EmployeesController@updatePersonalInformation');
Route::any('/employees/updateWorkInformation','EmployeesController@updateWorkInformation');
Route::any('/employees/updateCompensationBenefits','EmployeesController@updateCompensationBenefits');
Route::any('/employees/updateEducationalAttainment','EmployeesController@updateEducationalAttainment');
Route::any('/employees/updateMedicalHistory','EmployeesController@updateMedicalHistory');

Route::any('/employees/saveChildren','EmployeesController@saveChildren');
Route::any('/employees/saveCollege','EmployeesController@saveCollege');
Route::any('/employees/saveTraining','EmployeesController@saveTraining');
Route::any('/employees/saveVocational','EmployeesController@saveVocational');
Route::any('/employees/saveJobHistory','EmployeesController@saveJobHistory');

Route::any('/employees/employee_number/checkDuplicate', 'EmployeesController@checkDuplicate');
Route::any('/employees/email_address/checkDuplicate', 'EmployeesController@checkDuplicate');
Route::any('/employees/telephone_number/checkDuplicate', 'EmployeesController@checkDuplicate');
Route::any('/employees/cellphone_number/checkDuplicate', 'EmployeesController@checkDuplicate');
Route::any('/employees/father_cellphone_number/checkDuplicate', 'EmployeesController@checkDuplicate');
Route::any('/employees/mother_cellphone_number/checkDuplicate', 'EmployeesController@checkDuplicate');
Route::any('/employees/spouse_cellphone_number/checkDuplicate', 'EmployeesController@checkDuplicate');
Route::any('/employees/emergency_cellphone_number/checkDuplicate', 'EmployeesController@checkDuplicate');
Route::any('/employees/company_email/checkDuplicate', 'EmployeesController@checkDuplicate');
Route::any('/employees/company_cellphone_number/checkDuplicate', 'EmployeesController@checkDuplicate');

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

Route::any('/maintenance/departmentData','MaintenanceController@departmentData');
Route::any('/maintenance/departmentSave','MaintenanceController@departmentSave');
Route::any('/maintenance/departmentUpdate','MaintenanceController@departmentUpdate');

Route::any('/maintenance/department/checkDuplicate','MaintenanceController@checkDuplicate');
Route::any('/maintenance/company_name/checkDuplicate','MaintenanceController@checkDuplicate');
Route::any('/maintenance/branch_name/checkDuplicate','MaintenanceController@checkDuplicate');
Route::any('/maintenance/shift_code/checkDuplicate','MaintenanceController@checkDuplicate');
Route::any('/maintenance/supervisor_name/checkDuplicate','MaintenanceController@checkDuplicate');
Route::any('/maintenance/job_position_name/checkDuplicate','MaintenanceController@checkDuplicate');
Route::any('/maintenance/company_name_new/checkDuplicate','MaintenanceController@checkDuplicate');
Route::any('/maintenance/department_new/checkDuplicate','MaintenanceController@checkDuplicate');
Route::any('/maintenance/branch_name_new/checkDuplicate','MaintenanceController@checkDuplicate');
Route::any('/maintenance/shift_details_code/checkDuplicate','MaintenanceController@checkDuplicate');
Route::any('/maintenance/supervisor_name_new/checkDuplicate','MaintenanceController@checkDuplicate');
Route::any('/maintenance/job_position_name_new/checkDuplicate','MaintenanceController@checkDuplicate');

Route::any('/employees/college_data','EmployeesController@college_data');
Route::any('/employees/college_delete','EmployeesController@college_delete');

Route::any('/employees/children_data','EmployeesController@children_data');
Route::any('/employees/children_delete','EmployeesController@children_delete');

Route::any('/employees/training_data','EmployeesController@training_data');
Route::any('/employees/training_delete','EmployeesController@training_delete');

Route::any('/employees/vocational_data','EmployeesController@vocational_data');
Route::any('/employees/vocational_delete','EmployeesController@vocational_delete');

Route::any('/employees/job_history_data','EmployeesController@job_history_data');
Route::any('/employees/job_history_delete','EmployeesController@job_history_delete');

Route::any('/employees/viewLogs','EmployeesController@viewLogs');
Route::any('/employees/saveLogs','EmployeesController@saveLogs');
Route::any('/employees/saveSample','EmployeesController@saveSample');

Route::any('/employees/logs_data','EmployeesController@logs_data');
Route::any('/employees/logs_delete','EmployeesController@logs_delete');

Route::any('/employees/updateDocuments','EmployeesController@updateDocuments');

