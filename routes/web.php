<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UpdatesController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UpdateController;
// use Mail;
// Route::get('/testmail', function () {
//     return Mail::raw('Hello World!', function($msg) {$msg->to('emorej046@gmail.com')->subject('Test Email'); });
// });

//Home Controller
Auth::routes(['register' => false, 'verify' => false, 'confirm' => false]);
Route::get('/logout',[LoginController::class,'logout']);
Route::get('/', 'HomeController@index');
Route::get('/org', 'HomeController@org');
Route::get('/index/data','HomeController@index_data');
Route::get('/index_reload_data','HomeController@index_reload_data');

// Pages Controller
Route::any('/employees', 'PagesController@employees');
Route::any('/users', 'PagesController@users');
Route::any('/maintenance', 'PagesController@maintenance');
Route::any('/updates', 'PagesController@updates');

Route::get('/getCities','PagesController@getCities');
Route::get('/getRegion','PagesController@getRegion');
Route::any('/setJobPosition','PagesController@setJobPosition');
Route::any('/setJobDescription','PagesController@setJobDescription');
Route::any('/setJobRequirements','PagesController@setJobRequirements');

// Employees Controller
Route::any('/employees/logs_data','EmployeesController@logs_data');
Route::any('/employees/employee_logs','EmployeesController@employee_logs');
Route::any('/employees/listOfEmployees','EmployeesController@listOfEmployees');
Route::any('/employees/status','EmployeesController@employee_status');
Route::any('/employees/fetch','EmployeesController@employeeFetch');
Route::any('/upload_picture','EmployeesController@upload_picture');

// Save Controller
Route::any('/employees/insertImage','SaveController@insertImage');
Route::any('/employees/saveChildren','SaveController@saveChildren');
Route::any('/employees/saveCollege','SaveController@saveCollege');
Route::any('/employees/saveTraining','SaveController@saveTraining');
Route::any('/employees/saveVocational','SaveController@saveVocational');
Route::any('/employees/saveJobHistory','SaveController@saveJobHistory');

Route::any('/email_address/checkDuplicate','EmployeesController@duplicate_personal_info');
Route::any('/cellphone_number/checkDuplicate','EmployeesController@duplicate_personal_info');
Route::any('/employee_number/checkDuplicate','EmployeesController@duplicate_work_info');
Route::any('/company_email_address/checkDuplicate','EmployeesController@duplicate_work_info');

// Users Controller
Route::any('/users/listOfUsers','UsersController@listOfUsers');
Route::any('/users/saveUser','UsersController@saveUser');
Route::any('/users/updateUser','UsersController@updateUser');

// Maintenance Controller
Route::any('/maintenance/companyData','MaintenanceController@companyData');
Route::any('/maintenance/branchData','MaintenanceController@branchData');
Route::any('/maintenance/shiftData','MaintenanceController@shiftData');
Route::any('/maintenance/departmentData','MaintenanceController@departmentData');
Route::any('/maintenance/positionData','MaintenanceController@positionData');
Route::any('/maintenance/positionSave','MaintenanceController@positionSave');
Route::any('/maintenance/positionUpdate','MaintenanceController@positionUpdate');
Route::any('/position/checkDuplicate','MaintenanceController@checkDuplicate');

// Update Controller2
Route::any('/employees/updatePersonalInformation','UpdateController@updatePersonalInformation');
Route::any('/employees/updateWorkInformation','UpdateController@updateWorkInformation');
Route::any('/employees/updateCompensationBenefits','UpdateController@updateCompensationBenefits');
Route::any('/employees/updateEducationalAttainment','UpdateController@updateEducationalAttainment');
Route::any('/employees/updateJobHistory','UpdateController@updateJobHistory');
Route::any('/employees/updateMedicalHistory','UpdateController@updateMedicalHistory');
Route::any('/employees/updateDocuments','UpdateController@updateDocuments');

// Delete Controller
Route::any('/employees/college_delete','DeleteController@college_delete');
Route::any('/employees/children_delete','DeleteController@children_delete');
Route::any('/employees/training_delete','DeleteController@training_delete');
Route::any('/employees/vocational_delete','DeleteController@vocational_delete');
Route::any('/employees/job_history_delete','DeleteController@job_history_delete');
Route::any('/employees/memo_delete','DeleteController@memo_delete');
Route::any('/employees/evaluation_delete','DeleteController@evaluation_delete');
Route::any('/employees/contracts_delete','DeleteController@contracts_delete');
Route::any('/employees/resignation_delete','DeleteController@resignation_delete');
Route::any('/employees/termination_delete','DeleteController@termination_delete');

// Data Controller
Route::any('/employees/college_data','DataController@college_data');
Route::any('/employees/children_data','DataController@children_data');
Route::any('/employees/training_data','DataController@training_data');
Route::any('/employees/vocational_data','DataController@vocational_data');
Route::any('/employees/job_history_data','DataController@job_history_data');
Route::any('/employees/memo_data','DataController@memo_data');
Route::any('/employees/evaluation_data','DataController@evaluation_data');
Route::any('/employees/contracts_data','DataController@contracts_data');
Route::any('/employees/resignation_data','DataController@resignation_data');
Route::any('/employees/termination_data','DataController@termination_data');
Route::any('/job_history_summary/data','DataController@job_history_summary_data');
Route::any('/college_summary/data','DataController@college_summary_data');
Route::any('/training_summary/data','DataController@training_summary_data');
Route::any('/vocational_summary/data','DataController@vocational_summary_data');
Route::any('/employees/history_data','DataController@history_data');
Route::any('/employees/logs_data','DataController@logs_data');

// Try Controllers
Route::any('/evaluation','TryController@evaluation_blade');
Route::any('/evaluationSave','TryController@evaluation_save');
Route::any('/chosen','TryController@chosen_blade');
Route::any('/saveChosen','TryController@chosen_save');
Route::any('/import','TryController@import_blade');
Route::any('/test/import','TryController@test_import');
Route::any('/passwordValidation','TryController@passwordValidation_blade');
Route::any('/tabPane_blade','TryController@tabPane_blade');
Route::any('/spatie','TryController@spatie_blade');
Route::any('/export','TryController@export_blade');
Route::any('/export_data','TryController@export_data');
Route::any('/cropImage','TryController@cropImage_blade');
Route::any('/cropImageSave','TryController@cropImage_save');
Route::any('/reports','TryController@reports');
Route::any('/reports_data','TryController@reports_data');
Route::any('/status','TryController@status');
Route::any('/status_data','TryController@status_data');
Route::any('/users_page','PagesController@users_page');
Route::any('/saveUser','UsersController@saveUser');
Route::get('/change/validate','UsersController@change_validate');
Route::any('/change/password','UsersController@change_password');
Route::any('/users/status', 'UsersController@users_status');
Route::get('/logs_reload', 'EmployeesController@logs_reload');
Route::get('/employee_history_reload', 'EmployeesController@employee_history_reload');

// Updates Controller1
Route::get('/update_list', 'UpdatesController@update_list');
Route::get('/update_fetch', 'UpdatesController@update_fetch');
Route::get('/updates/college_data', 'UpdatesController@college_data');
Route::get('/updates/vocational_data', 'UpdatesController@vocational_data');
Route::get('/updates/training_data', 'UpdatesController@training_data');
Route::get('/updates/job_history_data', 'UpdatesController@job_history_data');
Route::any('/update_personal_information', 'UpdatesController@update_personal_information');
Route::any('/update_educational_attainment', 'UpdatesController@update_educational_attainment');
Route::any('/update_medical_history', 'UpdatesController@update_medical_history');
Route::any('/update_college', 'UpdatesController@update_college');
Route::any('/update_training', 'UpdatesController@update_training');
Route::any('/update_vocational', 'UpdatesController@update_vocational');
Route::any('/update_job_history', 'UpdatesController@update_job_history');
Route::any('/updates/request_data', 'UpdatesController@updates_request_data');