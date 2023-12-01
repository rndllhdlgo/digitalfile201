<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->index('FK_compensation_benefits_personal_information_tables');
            $table->string('employee_insurance')->nullable();
            $table->timestamps();
        });

        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch_name')->nullable();
            $table->timestamps();
        });

        Schema::create('children', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_children_tables_personal_information_tables');
            $table->string('child_name')->nullable();
            $table->string('child_birthday')->nullable();
            $table->string('child_gender')->nullable();
            $table->timestamps();
        });

        Schema::create('college', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_college_tables_personal_information_tables');
            $table->string('college_name')->nullable()->default('');
            $table->string('college_degree')->nullable()->default('');
            $table->string('college_inclusive_years_from')->nullable()->default('');
            $table->string('college_inclusive_years_to')->nullable()->default('');
            $table->timestamps();
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('entity');
            $table->timestamps();
        });

        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_id')->nullable()->default(0);
            $table->string('contracts_type')->nullable();
            $table->string('contracts_date')->nullable();
            $table->string('contracts_file')->nullable();
            $table->timestamps();
        });

        Schema::create('department', function (Blueprint $table) {
            $table->string('entity01', 10)->default('');
            $table->string('deptcode', 10)->default('');
            $table->string('deptdesc', 100)->default('');

            $table->unique(['entity01', 'deptcode'], 'code');
            $table->index(['entity01', 'deptdesc'], 'desc');
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_documents_personal_information_tables');
            $table->string('barangay_clearance_file')->nullable();
            $table->string('birthcertificate_file')->nullable();
            $table->string('diploma_file')->nullable();
            $table->string('medical_certificate_file')->nullable();
            $table->string('nbi_clearance_file')->nullable();
            $table->string('pag_ibig_file')->nullable();
            $table->string('philhealth_file')->nullable();
            $table->string('police_clearance_file')->nullable();
            $table->string('resume_file')->nullable();
            $table->string('sss_file')->nullable();
            $table->string('transcript_of_records_file')->nullable();
            $table->timestamps();
        });

        Schema::create('educational_attainments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->index('FK_educational_attainments_personal_information_tables');
            $table->string('secondary_school_name')->nullable()->default('');
            $table->string('secondary_school_address')->nullable()->default('');
            $table->string('secondary_school_inclusive_years_from')->nullable()->default('');
            $table->string('secondary_school_inclusive_years_to')->nullable()->default('');
            $table->string('primary_school_name')->nullable()->default('');
            $table->string('primary_school_address')->nullable()->default('');
            $table->string('primary_school_inclusive_years_from')->nullable()->default('');
            $table->string('primary_school_inclusive_years_to')->nullable()->default('');
            $table->timestamps();
        });

        Schema::create('emp_master', function (Blueprint $table) {
            $table->string('empno', 15)->unique('empno');
            $table->string('lname', 50)->default('');
            $table->string('fname', 50)->default('');
            $table->string('mname', 50)->default('');
            $table->string('email', 50)->default('');
            $table->string('emp_type', 10)->default('');
            $table->char('active', 1)->default('');
            $table->string('password', 100)->default('$2y$10$oxM6GZ/M3GjqjKV9py/iNudT7S7cmHDon2TrN1QoYDS/WX51UWatW');
            $table->string('level', 10)->default('0');
            $table->string('shift', 10);
            $table->string('entity01', 10)->default('');
            $table->string('entity02', 10)->default('');
            $table->string('entity03', 10)->default('');
            $table->string('deptcode', 10);
            $table->string('position', 10)->default('');
            $table->string('sex', 2)->default('');
            $table->string('civil_status', 2)->default('');
            $table->date('birth_date')->nullable();
            $table->date('empl_date')->nullable();
            $table->date('term_date')->nullable();
            $table->string('remember_token', 60)->nullable();
            $table->string('crypt', 50)->default('');
            $table->text('avatar_user');
            $table->string('txfer', 10)->default('');
            $table->string('stat', 10)->default('1');

            $table->index(['entity01', 'lname', 'fname', 'mname'], 'company_name');
            $table->index(['entity01', 'empno'], 'company_empno');
            $table->unique(['entity02', 'empno'], 'branch');
            $table->unique(['entity02', 'empno'], 'department');
            $table->index(['lname', 'fname', 'mname'], 'empname');
        });

        Schema::create('employee_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_logs_tables_personal_information_tables');
            $table->bigInteger('user_id')->nullable()->default(0);
            $table->string('username')->nullable();
            $table->string('role')->nullable();
            $table->longText('activity')->nullable();
            $table->longText('logs')->nullable();
            $table->timestamps();
        });

        Schema::create('entity03', function (Blueprint $table) {
            $table->string('entity01', 10)->default('');
            $table->string('entity02', 10)->default('');
            $table->string('entity03', 10);
            $table->string('entity03_desc', 100);
            $table->string('addr1', 100);
            $table->string('addr2', 100);
            $table->string('contact', 100);
            $table->string('email', 100);
            $table->string('telnum1', 15);
            $table->string('telnum2', 15);

            $table->index(['entity01', 'entity02', 'entity03', 'entity03_desc'], 'desc3');
            $table->unique(['entity01', 'entity03'], 'code1');
            $table->unique(['entity01', 'entity02', 'entity03'], 'code2');
            $table->index(['entity01', 'entity03_desc'], 'desc1');
            $table->index(['entity01', 'entity02', 'entity03_desc'], 'desc2');
        });

        Schema::create('evaluation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_evaluation_tables_personal_information_tables');
            $table->string('evaluation_reason')->nullable();
            $table->string('evaluation_date')->nullable();
            $table->string('evaluation_evaluated_by')->nullable();
            $table->string('evaluation_file')->nullable();
            $table->timestamps();
        });

        // Schema::create('failed_jobs', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->text('connection');
        //     $table->text('queue');
        //     $table->longText('payload');
        //     $table->longText('exception');
        //     $table->timestamp('failed_at')->useCurrent();
        // });

        Schema::create('hmo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_college_tables_personal_information_tables');
            $table->string('hmo')->nullable()->default('');
            $table->string('coverage')->nullable()->default('');
            $table->string('particulars')->nullable()->default('');
            $table->string('room')->nullable()->default('');
            $table->string('effectivity_date')->nullable()->default('');
            $table->string('expiration_date')->nullable()->default('');
            $table->string('status')->nullable()->default('ACTIVE');
            $table->timestamps();
        });

        Schema::create('ipaddress', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ipaddress', 50)->nullable()->default('0');
            $table->timestamps();
        });

        Schema::create('job_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_job_history_tables_personal_information_tables');
            $table->string('job_company_name')->nullable();
            $table->string('job_description')->nullable();
            $table->string('job_position')->nullable();
            $table->string('job_contact_number')->nullable();
            $table->string('job_inclusive_years_from')->nullable();
            $table->string('job_inclusive_years_to')->nullable();
            $table->timestamps();
        });

        Schema::create('medical_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->index('FK_medical_histories_personal_information_tables');
            $table->string('past_medical_condition')->nullable()->default('');
            $table->string('allergies')->nullable()->default('');
            $table->string('medication')->nullable()->default('');
            $table->string('psychological_history')->nullable()->default('');
            $table->timestamps();
        });

        Schema::create('memo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_memo_tables_personal_information_tables');
            $table->string('memo_subject')->nullable();
            $table->string('memo_date')->nullable();
            $table->string('memo_penalty')->nullable();
            $table->string('memo_file')->nullable();
            $table->timestamps();
        });

        // Schema::create('model_has_permissions', function (Blueprint $table) {
        //     $table->unsignedBigInteger('permission_id');
        //     $table->string('model_type');
        //     $table->unsignedBigInteger('model_id');

        //     $table->index(['model_id', 'model_type']);
        //     $table->primary(['permission_id', 'model_id', 'model_type']);
        // });

        // Schema::create('model_has_roles', function (Blueprint $table) {
        //     $table->unsignedBigInteger('role_id');
        //     $table->string('model_type');
        //     $table->unsignedBigInteger('model_id');

        //     $table->index(['model_id', 'model_type']);
        //     $table->primary(['role_id', 'model_id', 'model_type']);
        // });

        Schema::create('multiple_save', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('memo_subject')->nullable();
            $table->string('memo_date')->nullable();
            $table->string('memo_penalty')->nullable();
            $table->string('memo_file')->nullable();
            $table->timestamps();
        });

        // Schema::create('password_resets', function (Blueprint $table) {
        //     $table->string('email')->index();
        //     $table->string('token');
        //     $table->timestamp('created_at')->nullable();
        // });

        Schema::create('pdf_file', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('pdf_file')->nullable()->default('');
            $table->timestamps();
        });

        // Schema::create('permissions', function (Blueprint $table) {
        // Schema::create('permissions', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name');
        //     $table->string('guard_name');
        //     $table->timestamps();

        //     $table->unique(['name', 'guard_name']);
        // });

        Schema::create('personal_information_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empno')->nullable()->default('')->unique('unique_empno');
            $table->string('last_name')->nullable()->default('');
            $table->string('first_name')->nullable()->default('');
            $table->string('middle_name')->nullable()->default('');
            $table->string('birthday')->nullable()->default('');
            $table->string('suffix')->nullable()->default('');
            $table->string('stat')->nullable()->default('');
            $table->string('shift')->nullable()->default('');
            $table->string('nickname')->nullable()->default('');
            $table->string('gender')->nullable()->default('');
            $table->string('civil_status')->nullable()->default('');
            $table->string('cellphone_number')->nullable()->default('');
            $table->string('address', 500)->nullable()->default('');
            $table->string('ownership')->nullable()->default('');
            $table->string('province')->nullable()->default('');
            $table->string('city')->nullable()->default('');
            $table->string('region')->nullable()->default('');
            $table->string('blood_type')->nullable()->default('');
            $table->string('height')->nullable()->default('');
            $table->string('weight')->nullable()->default('');
            $table->string('religion')->nullable()->default('');
            $table->string('email_address')->nullable()->default('');
            $table->string('telephone_number')->nullable()->default('');
            $table->string('spouse_name')->nullable()->default('');
            $table->string('spouse_contact_number')->nullable()->default('');
            $table->string('spouse_profession')->nullable()->default('');
            $table->string('father_name')->nullable()->default('');
            $table->string('father_contact_number')->nullable()->default('');
            $table->string('father_profession')->nullable()->default('');
            $table->string('mother_name')->nullable()->default('');
            $table->string('mother_contact_number')->nullable()->default('');
            $table->string('mother_profession')->nullable()->default('');
            $table->string('emergency_contact_name')->nullable()->default('');
            $table->string('emergency_contact_relationship')->nullable()->default('');
            $table->string('emergency_contact_number')->nullable()->default('');
            $table->string('employee_image')->nullable()->default('');
            $table->timestamps();
        });

        Schema::create('positions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_position_name')->nullable();
            $table->string('job_description', 1000)->nullable();
            $table->string('job_requirements', 1000)->nullable();
            $table->timestamps();
        });

        Schema::create('primary_school', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_college_tables_personal_information_tables');
            $table->string('primary_name')->nullable()->default('');
            $table->string('primary_address')->nullable()->default('');
            $table->string('primary_from')->nullable()->default('');
            $table->string('primary_to')->nullable()->default('');
            $table->timestamps();
        });

        Schema::create('raffle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname')->nullable()->default('');
            $table->string('department')->nullable()->default('');
            $table->string('status')->nullable()->default('');
            $table->timestamps();
        });

        Schema::create('receipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('receipt');
            $table->string('pdf_file');
            $table->timestamps();
        });

        Schema::create('refcitymun', function (Blueprint $table) {
            $table->integer('id');
            $table->string('psgcCode')->nullable();
            $table->text('citymunDesc')->nullable();
            $table->string('regCode')->nullable();
            $table->string('provCode')->nullable();
            $table->string('citymunCode')->nullable();
        });

        Schema::create('refprovince', function (Blueprint $table) {
            $table->integer('id');
            $table->string('psgcCode')->nullable();
            $table->text('provDesc')->nullable();
            $table->string('regCode')->nullable();
            $table->string('provCode')->nullable();
        });

        Schema::create('refregion', function (Blueprint $table) {
            $table->integer('id');
            $table->string('psgcCode')->nullable();
            $table->text('regDesc')->nullable();
            $table->string('regCode')->nullable();
        });

        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date', 50)->default('');
            $table->string('filename')->default('');
            $table->string('branch')->default('');
            $table->timestamps();
        });

        Schema::create('request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->default(0);
            $table->string('empno')->default('');
            $table->string('field')->nullable();
            $table->string('original_value')->nullable();
            $table->string('new_value')->nullable();
            $table->timestamps();
        });

        Schema::create('resignation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_resignation_tables_personal_information_tables');
            $table->string('resignation_reason')->nullable();
            $table->string('resignation_date')->nullable();
            $table->string('resignation_file');
            $table->timestamps();
        });

        // Schema::create('role_has_permissions', function (Blueprint $table) {
        //     $table->unsignedBigInteger('permission_id');
        //     $table->unsignedBigInteger('role_id')->index('role_has_permissions_role_id_foreign');

        //     $table->primary(['permission_id', 'role_id']);
        // });

        // Schema::create('roles', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name');
        //     $table->string('guard_name');
        //     $table->timestamps();

        //     $table->unique(['name', 'guard_name']);
        // });

        Schema::create('secondary_school', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_college_tables_personal_information_tables');
            $table->string('secondary_name')->nullable()->default('');
            $table->string('secondary_address')->nullable()->default('');
            $table->string('secondary_from')->nullable()->default('');
            $table->string('secondary_to')->nullable()->default('');
            $table->timestamps();
        });

        Schema::create('shift', function (Blueprint $table) {
            $table->string('shift', 10)->unique('shift');
            $table->string('desc', 100);
            $table->integer('same_inout');
            $table->time('wholeday_gperiod');
            $table->time('in');
            $table->time('in_gperiod');
            $table->time('half_day_end');
            $table->char('half_day_end_nextday', 1)->default('N');
            $table->char('half_day_duty', 1)->default('N');
            $table->time('half_day_start');
            $table->char('half_day_start_nextday', 1)->default('N');
            $table->char('snack_break1', 1)->default('N');
            $table->time('snack_break1_out');
            $table->char('snack_break1_out_nextday', 1)->default('N');
            $table->time('snack_break1_in');
            $table->char('snack_break1_in_nextday', 1)->default('N');
            $table->char('break', 1)->default('N');
            $table->time('break_out');
            $table->char('break_out_nextday', 1)->default('N');
            $table->time('break_in_start');
            $table->char('break_in_start_nextday', 1)->default('N');
            $table->char('break_in_fixed_start', 1)->default('Y');
            $table->time('break_in');
            $table->char('break_in_nextday', 1)->default('N');
            $table->time('break_in_gperiod');
            $table->time('break_length');
            $table->char('break_flexible', 1)->default('N');
            $table->char('snack_break2', 1)->default('N');
            $table->time('snack_break2_out');
            $table->char('snack_break2_out_nextday', 1)->default('N');
            $table->time('snack_break2_in');
            $table->char('snack_break2_in_nextday', 1)->default('N');
            $table->time('out');
            $table->char('out_nextday', 1)->default('N');
            $table->char('nextday_out', 1)->default('N');
            $table->char('night_inout', 1)->default('N');
            $table->time('night_out')->default('00:00:00');
            $table->time('night_in')->default('00:00:00');
            $table->char('restday_duty', 1)->default('N');
            $table->char('holiday_duty', 1)->default('N');
            $table->time('hours_of_work')->default('08:00:00');
            $table->time('otreg');
            $table->time('otrest');
            $table->time('othol');
            $table->time('otholrest');
            $table->time('otspl');
            $table->time('otsplrest');
            $table->time('otdbl');
            $table->time('otdblrest');
            $table->time('otndiff');
            $table->time('minndiff');
            $table->time('totalot');
            $table->time('totalotless');
            $table->char('actual_time', 1)->default('Y');
            $table->char('flexi_time', 1)->default('N');
            $table->char('verify_absences', 1)->default('N');
            $table->char('compute_amlate', 1)->default('Y');
            $table->char('compute_amundertime', 1)->default('Y');
            $table->char('compute_pmlate', 1)->default('Y');
            $table->char('compute_pmundertime', 1)->default('Y');
            $table->char('restday_compute_amlate', 1)->default('N');
            $table->char('restday_compute_amut', 1)->default('N');
            $table->char('restday_compute_pmlate', 1)->default('N');
            $table->char('restday_compute_pmut', 1)->default('N');
            $table->char('holiday_duty_compute_amlate', 1)->default('Y');
            $table->char('holiday_duty_compute_amut', 1)->default('Y');
            $table->char('holiday_duty_compute_pmlate', 1)->default('Y');
            $table->char('holiday_duty_compute_pmut', 1)->default('Y');
            $table->char('holiday_off_compute_amlate', 1)->default('N');
            $table->char('holiday_off_compute_amut', 1)->default('N');
            $table->char('holiday_off_compute_pmlate', 1)->default('N');
            $table->char('holiday_off_compute_pmut', 1)->default('N');
            $table->char('halfday_ut', 1)->default('N');
            $table->char('send_email', 1)->default('N');
            $table->char('send_sms', 1)->default('N');
            $table->char('no_late_ut_reg', 1)->default('S');
            $table->char('no_late_ut_rest', 1)->default('S');
            $table->char('no_late_ut_holduty', 1)->default('S');
            $table->char('no_late_ut_holoff', 1)->default('S');
            $table->char('incomplete_log', 1)->default('');
            $table->integer('otmin_divisibleby')->default(1);
            $table->char('need_otapproval', 1)->default('Y');
        });

        Schema::create('status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stat')->nullable()->default('1');
            $table->timestamps();
        });

        Schema::create('supervisors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supervisor_name');
            $table->timestamps();
        });

        Schema::create('table_test', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('test_fname')->nullable();
            $table->string('test_mname')->nullable();
            $table->string('test_lname')->nullable();
            $table->timestamps();
        });

        Schema::create('termination', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_termination_tables_personal_information_tables');
            $table->string('termination_reason')->nullable();
            $table->string('termination_date')->nullable();
            $table->string('termination_file')->nullable();
            $table->timestamps();
        });

        Schema::create('test', function (Blueprint $table) {
            $table->longText('cp')->nullable();
            $table->string('empno', 50)->nullable();
        });

        Schema::create('trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_training_tables_personal_information_tables');
            $table->string('training_name')->nullable();
            $table->string('training_title')->nullable();
            $table->string('training_inclusive_years_from')->nullable();
            $table->string('training_inclusive_years_to')->nullable();
            $table->timestamps();
        });

        Schema::create('try', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname')->nullable()->default('');
            $table->string('age', 50)->nullable()->default('');
            $table->timestamps();
        });

        Schema::create('user_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable()->default(0);
            $table->string('username')->nullable();
            $table->string('role')->nullable();
            $table->longText('activity')->nullable();
            $table->timestamps();
        });

        Schema::create('user_logs_copy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable()->default(0);
            $table->string('username')->nullable();
            $table->string('role')->nullable();
            $table->longText('activity')->nullable();
            $table->timestamps();
        });

        // Schema::create('users', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name')->nullable();
        //     $table->string('user_level')->nullable();
        //     $table->string('email')->nullable()->unique();
        //     $table->string('status')->nullable();
        //     $table->string('session_id')->nullable();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password')->nullable();
        //     $table->rememberToken();
        //     $table->timestamps();
        // });

        Schema::create('users_copy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('user_level')->nullable();
            $table->string('email')->nullable()->unique('users_email_unique');
            $table->string('status')->nullable();
            $table->string('session_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('vocationals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_vocational_tables_personal_information_tables');
            $table->string('empno')->nullable();
            $table->string('vocational_name')->nullable();
            $table->string('vocational_course')->nullable();
            $table->string('vocational_inclusive_years_from')->nullable();
            $table->string('vocational_inclusive_years_to')->nullable();
            $table->timestamps();
        });

        Schema::create('work_information_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('employee_number')->nullable()->default('')->unique('employee_number');
            $table->string('employee_company')->nullable()->default('');
            $table->string('employee_department')->nullable()->default('');
            $table->string('employee_branch')->nullable()->default('');
            $table->string('employment_status')->nullable()->default('');
            $table->string('employment_origin')->nullable()->default('');
            $table->string('employee_shift')->nullable()->default('');
            $table->string('employee_position')->nullable()->default('');
            $table->string('employee_supervisor')->nullable()->default('');
            $table->string('date_hired')->nullable()->default('');
            $table->string('company_email_address')->nullable()->default('');
            $table->string('company_contact_number')->nullable()->default('');
            $table->string('hmo_number')->nullable()->default('');
            $table->string('sss_number')->nullable()->default('');
            $table->string('pag_ibig_number')->nullable()->default('');
            $table->string('philhealth_number')->nullable()->default('');
            $table->string('tin_number')->nullable()->default('');
            $table->string('account_number')->nullable()->default('');
            $table->timestamps();
        });

        Schema::create('work_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable()->default(0)->index('FK_history_logs_personal_information_tables');
            $table->unsignedBigInteger('user_id')->nullable()->default(0);
            $table->string('username')->nullable();
            $table->string('role')->nullable();
            $table->longText('activity')->nullable();
            $table->longText('history')->nullable();
            $table->timestamps();
        });

        Schema::table('benefits', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_compensation_benefits_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('children', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_children_tables_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('college', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_college_tables_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_documents_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('educational_attainments', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_educational_attainments_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('employee_logs', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_logs_tables_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('evaluation', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_evaluation_tables_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('hmo', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'hmo_ibfk_1')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('job_history', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_job_history_tables_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('medical_histories', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_medical_histories_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('memo', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_memo_tables_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        // Schema::table('model_has_permissions', function (Blueprint $table) {
        //     $table->foreign(['permission_id'])->references(['id'])->on('permissions')->onDelete('CASCADE');
        // });

        // Schema::table('model_has_roles', function (Blueprint $table) {
        //     $table->foreign(['role_id'])->references(['id'])->on('roles')->onDelete('CASCADE');
        // });

        Schema::table('primary_school', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'primary_school_ibfk_1')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('resignation', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_resignation_tables_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        // Schema::table('role_has_permissions', function (Blueprint $table) {
        //     $table->foreign(['role_id'])->references(['id'])->on('roles')->onDelete('CASCADE');
        //     $table->foreign(['permission_id'])->references(['id'])->on('permissions')->onDelete('CASCADE');
        // });

        Schema::table('secondary_school', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'secondary_school_ibfk_1')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('termination', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_termination_tables_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('trainings', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_training_tables_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('vocationals', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_vocational_tables_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('work_information_tables', function (Blueprint $table) {
            $table->foreign(['employee_number'], 'FK_work_information_tables_personal_information_tables')->references(['empno'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });

        Schema::table('work_logs', function (Blueprint $table) {
            $table->foreign(['employee_id'], 'FK_history_logs_personal_information_tables')->references(['id'])->on('personal_information_tables')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
