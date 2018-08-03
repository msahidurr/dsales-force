<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblUserType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_type', function (Blueprint $table) {
            $table->increments('id_user_type');
            $table->integer('user_id')->nullable();
            $table->string('user_type')->nullable();
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
