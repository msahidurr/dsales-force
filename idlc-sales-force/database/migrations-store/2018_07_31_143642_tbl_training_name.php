<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblTrainingName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_training_name', function (Blueprint $table) {
            $table->increments('id_training_name');
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('last_action')->nullable();
            $table->string('is_active')->nullable();
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
