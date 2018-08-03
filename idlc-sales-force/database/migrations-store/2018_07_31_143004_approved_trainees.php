<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApprovedTrainees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_trainees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('training_schedule_id')->nullable();
            $table->integer('applicant_no')->nullable();
            $table->integer('training_required')->nullable();
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
