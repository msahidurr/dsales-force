<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblNewOccupation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_new_occupation', function (Blueprint $table) {
            $table->increments('id_occupation');
            $table->integer('user_id')->nullable();
            $table->string('occupation')->nullable();
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
