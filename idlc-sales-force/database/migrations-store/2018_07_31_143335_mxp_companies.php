<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MxpCompanies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mxp_companies', function (Blueprint $table) {  
            $table->increments('id');
            $table->integer('group_id')->nullabe();
            $table->string('name')->nullabe();
            $table->string('description')->nullabe();
            $table->string('address')->nullabe();
            $table->string('phone')->nullabe();
            $table->integer('is_active')->nullabe();
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
