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
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\TryController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\TemplateController;

//Home Controller
Auth::routes(['register' => false, 'verify' => false, 'confirm' => false]);
Route::middleware(['session','check_device','checkIpAddress'])->group(function(){
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/logout',[LoginController::class, 'logout']);
    Route::get('/', 'HomeController@index');
    Route::get('/index/data','HomeController@index_data');

    // Pages Controller
    Route::any('/employees', 'PagesController@employees');
    Route::any('/users', 'PagesController@users');
    Route::any('/maintenance', 'PagesController@maintenance');
    Route::any('/getCities', 'PagesController@getCities');
    Route::any('/getRegion', 'PagesController@getRegion');
    Route::any('/setJobPosition', 'PagesController@setJobPosition');
    Route::any('/setJobDescription', 'PagesController@setJobDescription');
    Route::any('/setJobRequirements', 'PagesController@setJobRequirements');

    // Employees Controller
    Route::any('/employees/data','EmployeesController@employees_data');
    Route::any('/employees/fetch','EmployeesController@employee_fetch');
    Route::any('/upload_picture','EmployeesController@upload_picture');
    Route::any('/update_stat','EmployeesController@update_stat');
    Route::any('/duplicateCheck','EmployeesController@duplicateCheck');

    // Save Controller
    Route::any('/employees/insertImage','SaveController@insertImage');
    Route::any('/employees/saveChildren','SaveController@saveChildren');
    Route::any('/employees/saveCollege','SaveController@saveCollege');
    Route::any('/employees/saveSecondary','SaveController@saveSecondary');
    Route::any('/employees/savePrimary','SaveController@savePrimary');
    Route::any('/employees/saveTraining','SaveController@saveTraining');
    Route::any('/employees/saveVocational','SaveController@saveVocational');
    Route::any('/employees/saveJobHistory','SaveController@saveJobHistory');
    Route::any('/employees/saveHmo','SaveController@saveHmo');

    // Users Controller
    Route::any('/users/listOfUsers','UsersController@listOfUsers');
    Route::any('/users/saveUser','UsersController@saveUser');
    Route::any('/users/updateUser','UsersController@updateUser');
    Route::any('/change/validate','UsersController@change_validate');
    Route::any('/change/password','UsersController@change_password');
    Route::any('/users/status', 'UsersController@users_status');

    // Maintenance Controller
    Route::any('/maintenance/companyData','MaintenanceController@companyData');
    Route::any('/maintenance/branchData','MaintenanceController@branchData');
    Route::any('/maintenance/shiftData','MaintenanceController@shiftData');
    Route::any('/maintenance/departmentData','MaintenanceController@departmentData');
    Route::any('/maintenance/positionData','MaintenanceController@positionData');
    Route::any('/maintenance/positionSave','MaintenanceController@positionSave');
    Route::any('/maintenance/positionUpdate','MaintenanceController@positionUpdate');

    // Delete Controller
    Route::any('/employees/college_delete','DeleteController@college_delete');
    Route::any('/employees/secondary_delete','DeleteController@secondary_delete');
    Route::any('/employees/primary_delete','DeleteController@primary_delete');
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
    Route::any('/employees/secondary_data','DataController@secondary_data');
    Route::any('/employees/primary_data','DataController@primary_data');
    Route::any('/employees/children_data','DataController@children_data');
    Route::any('/employees/training_data','DataController@training_data');
    Route::any('/employees/vocational_data','DataController@vocational_data');
    Route::any('/employees/job_history_data','DataController@job_history_data');
    Route::any('/employees/memo_data','DataController@memo_data');
    Route::any('/employees/evaluation_data','DataController@evaluation_data');
    Route::any('/employees/contracts_data','DataController@contracts_data');
    Route::any('/employees/resignation_data','DataController@resignation_data');
    Route::any('/employees/termination_data','DataController@termination_data');
    Route::any('/employees/job_history_summary_data','DataController@job_history_summary_data');
    Route::any('/employees/college_summary_data','DataController@college_summary_data');
    Route::any('/employees/secondary_summary_data','DataController@secondary_summary_data');
    Route::any('/employees/primary_summary_data','DataController@primary_summary_data');
    Route::any('/employees/training_summary_data','DataController@training_summary_data');
    Route::any('/employees/vocational_summary_data','DataController@vocational_summary_data');
    Route::any('/employees/history_data','DataController@history_data');
    Route::any('/employees/logs_data','DataController@logs_data');
    Route::any('/employees/leave_data','DataController@leave_data');
    Route::any('/employees/hmo_data','DataController@hmo_data');

    // Update Controller
    Route::any('/employees/updatePersonalInformation','UpdateController@updatePersonalInformation');
    Route::any('/employees/updateWorkInformation','UpdateController@updateWorkInformation');
    Route::any('/employees/updateBenefits','UpdateController@updateBenefits');
    Route::any('/employees/updateEducationalAttainment','UpdateController@updateEducationalAttainment');
    Route::any('/employees/updateJobHistory','UpdateController@updateJobHistory');
    Route::any('/employees/updateMedicalHistory','UpdateController@updateMedicalHistory');
    Route::any('/employees/updateDocuments','UpdateController@updateDocuments');
    Route::any('/employees/updateHmo','UpdateController@updateHmo');

    // Try Controllers
    Route::any('/import_blade','TryController@import_blade');
    Route::any('/import_save','TryController@import_save');
    Route::any('/passwordValidation','TryController@passwordValidation_blade');
    Route::any('/tabPane_blade','TryController@tabPane_blade');
    Route::any('/spatie','TryController@spatie_blade');
    Route::any('/export','TryController@export_blade');
    Route::any('/export_data','TryController@export_data');
    Route::any('/cropperImage','TryController@cropperImage');
    Route::any('/cropImage','TryController@cropImage_blade');
    Route::any('/cropImageSave','TryController@cropImage_save');
    Route::any('/reports','TryController@reports');
    Route::any('/reports_data','TryController@reports_data');
    Route::any('/status','TryController@status');
    Route::any('/status_data','TryController@status_data');
    Route::any('/users_page','PagesController@users_page');
    Route::any('/saveUser','UsersController@saveUser');
    Route::get('/pdf', 'PdfController@index')->name('pdf.upload');
    Route::post('/pdf/extract', 'PdfController@extractText')->name('pdf.extracted');
    Route::any('/pdf/image', 'TryController@pdf_blade');
    Route::any('/save_pdf', 'TryController@save_pdf');
    Route::any('/receipt', 'TryController@receipt');
    Route::any('/splitPdf', 'TryController@splitPdf');
    Route::any('/save_receipt', 'TryController@save_receipt');
    Route::any('/sendEmail', 'SendMailController@sendEmail');
    Route::any('/email', 'SendMailController@email');
    Route::any('/responsive', 'TryController@responsive');
    Route::any('/imageToPdf', 'TryController@imageToPdf');
    Route::any('/dynamic', 'TryController@dynamic');
    Route::any('/dynamicColumns', 'TryController@dynamicColumns');
    Route::any('/qr', 'QrController@qr');
    Route::any('/qrshow', 'QrController@qrshow');
    Route::any('/exportTable', 'TryController@exportTable');
    Route::any('/data', 'TryController@data');
    Route::any('/print', 'TryController@print');
    Route::any('/sql_save', 'TryController@sql_save');
    // Route::any('/backup', 'BackUpController@backup');
    Route::any('/sqlbackup', 'SQLController@sqlbackup');
    Route::any('/notFound', 'SQLController@notFound');
    Route::any('/query', 'QueryController@query');
    Route::any('/artisan', 'ArtisanController@artisan');
});

Route::get('/generateJaspher', function (Request $request){
    if(file_exists(public_path(). '/reports/pdf/' . 'Employees.pdf')){
        unlink(public_path(). '/reports/pdf/' . 'Employees.pdf');
    }
    $input = public_path() . '/reports/jrxml/' . 'Employees_A4.jrxml';
    $output = public_path() . '/reports/pdf/' . 'Employees';
    $options = [
        'format' => ['pdf'],
        'locale' => 'en',
        'db_connection' => [
            'driver' => 'mysql',
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'database' => env('DB_DATABASE'),
            'port' => env('DB_PORT', '3306')
        ]
    ];

    $jasper = new PHPJasper\PHPJasper;
    $jasper->process(
            $input,
            $output,
            $options
    )->execute();

    // echo $jasper->process(
    //         $input,
    //         $output,
    //         $options
    // )->output();

    $pdfFilePath = public_path(). '/reports/pdf/' . 'Employees.pdf';
    $pdf = new Spatie\PdfToImage\Pdf($pdfFilePath);
    $numPages = $pdf->getNumberOfPages();
    // return $numPages;
    return response()->file($pdfFilePath , ['Content-Type' => 'application/pdf']);
});

// TemplateController
Route::any('/google_chart', 'TemplateController@google_chart');
Route::any('/google_chart_data', 'TemplateController@google_chart_data');