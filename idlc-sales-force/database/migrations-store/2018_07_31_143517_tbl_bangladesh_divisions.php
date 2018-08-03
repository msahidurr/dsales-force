<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblBangladeshDivisions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bangladesh_divisions', function (Blueprint $table) {
            $table->increments('division_id');
            $table->integer('user_id')->nullable();
            $table->string('division_name')->nullable();
            $table->integer('is_deleted')->nullable();
            $table->integer('is_active')->nullable();
            $table->string('last_action')->nullable();
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
