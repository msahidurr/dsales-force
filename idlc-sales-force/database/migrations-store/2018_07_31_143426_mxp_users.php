<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MxpUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mxp_users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('type')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('is_active')->nullable();
            $table->integer('user_role_id')->nullable();
            $table->string('verified')->nullable();
            $table->string('verification_token')->nullable();
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
