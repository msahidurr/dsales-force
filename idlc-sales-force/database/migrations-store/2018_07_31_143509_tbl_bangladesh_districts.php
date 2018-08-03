<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblBangladeshDistricts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bangladesh_districts', function (Blueprint $table) {
            $table->increments('district_id');
            $table->integer('user_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->string('district_name')->nullable();
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
