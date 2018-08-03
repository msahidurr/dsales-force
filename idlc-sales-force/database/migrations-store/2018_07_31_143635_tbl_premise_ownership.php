<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblPremiseOwnership extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_premise_ownership', function (Blueprint $table) {
            $table->increments('id_premise_ownership');
            $table->integer('user_id')->nullable();
            $table->string('premise_ownership')->nullable();
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
