<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MxpTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mxp_translations', function (Blueprint $table) {
            $table->increments('translation_id');
            $table->string('translation')->nullable();
            $table->integer('translation_key_id')->nullable();
            $table->string('lan_code')->nullable();
            $table->integer('same_trans_key_id')->nullable();
            $table->integer('is_active')->nullable();
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
