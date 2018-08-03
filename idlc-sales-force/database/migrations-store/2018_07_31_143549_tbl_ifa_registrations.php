<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblIfaRegistrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ifa_registrations', function (Blueprint $table) {
            $table->increments('application_no');
            $table->integer('ifa_reg_id')->nullable();
            $table->string('application_status')->nullable();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('date_of_birth');
            $table->string('national_id_card_no')->nullable();
            $table->string('nid_validation_status')->nullable();
            $table->string('is_active')->nullable();
            $table->string('is_delete')->nullable();
            $table->string('image_ext')->nullable();
            $table->string('pre_addr_flat_no')->nullable();
            $table->string('pre_addr_house_no')->nullable();
            $table->string('pre_addr_road_no')->nullable();
            $table->integer('pre_addr_division_id')->nullable();
            $table->integer('pre_addr_district_id')->nullable();
            $table->string('pre_addr_ps_id')->nullable();
            $table->string('pre_addr_premise_ownership')->nullable();
            $table->string('per_addr_flat_no')->nullable();
            $table->string('per_addr_house_no')->nullable();
            $table->string('per_addr_road_no')->nullable();
            $table->integer('per_addr_division_id')->nullable();
            $table->integer('per_addr_district_id')->nullable();
            $table->string('per_addr_ps_id')->nullable();
            $table->string('per_addr_premise_ownership')->nullable();
            $table->string('latest_degree')->nullable();
            $table->string('last_educational_institution')->nullable();
            $table->string('is_job_holder')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('employee_id_no')->nullable();
            $table->string('designation')->nullable();
            $table->string('job_holder_department')->nullable();
            $table->string('is_student')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('student_id_card_no')->nullable();
            $table->string('receive_sales_commission_by')->nullable();
            $table->integer('bank_id')->nullable();
            $table->integer('bank_branch_id')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('bKash_acc_type')->nullable();
            $table->integer('bKash_mobile_no')->nullable();
            $table->string('training_status')->nullable();
            $table->string('student_department')->nullable();
            $table->string('is_same_as_present_address')->nullable();
            $table->string('others_nationality')->nullable();
            $table->string('others_user_type')->nullable();
            $table->integer('user_type_id')->nullable();
            $table->string('button_presses')->nullable();
            $table->timestamps(); 
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
