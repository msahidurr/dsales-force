<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblNewRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_new_rating', function (Blueprint $table) {
            $table->increments('id_rating');
            $table->integer('user_id')->nullable();
            $table->string('rating')->nullable();
            $table->string('lead_completed_number')->nullable();
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
