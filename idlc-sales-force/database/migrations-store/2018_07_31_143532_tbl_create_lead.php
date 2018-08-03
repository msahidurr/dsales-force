<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCreateLead extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_create_lead', function (Blueprint $table) {
            $table->increments('id_create_lead');
            $table->integer('user_id')->nullable();
            $table->integer('lead_number')->nullable();
            $table->string('lead_type')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('personal_name')->nullable();
            $table->string('lead_assign')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->string('area')->nullable();
            $table->string('occupation_id')->nullable();
            $table->string('investment_name')->nullable();
            $table->string('investment_type')->nullable();
            $table->string('follow_up_date')->nullable();
            $table->string('contact_status')->nullable();
            $table->string('interest_label')->nullable();
            $table->string('investment_action_id')->nullable();
            $table->string('remark_or_comment')->nullable();
            $table->string('last_action')->nullable();
            $table->string('assign_ifa_register_name')->nullable();
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
