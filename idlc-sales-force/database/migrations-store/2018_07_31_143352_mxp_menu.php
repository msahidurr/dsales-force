<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MxpMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mxp_menu', function (Blueprint $table) {
            $table->increments('menu_id');
            $table->string('name')->nullable();
            $table->string('route_name')->nullable();
            $table->string('description')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('is_active')->nullable();
            $table->integer('order_id')->nullable();
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
