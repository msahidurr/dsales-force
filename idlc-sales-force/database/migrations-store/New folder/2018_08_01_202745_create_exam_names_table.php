<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_exam_names', function (Blueprint $table) {
            $table->increments('id_exam_name');
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
        Schema::dropIfExists('tbl_exam_names');
    }
}
