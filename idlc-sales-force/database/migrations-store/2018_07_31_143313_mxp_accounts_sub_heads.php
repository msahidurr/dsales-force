<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MxpAccountsSubHeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mxp_accounts_sub_heads', function (Blueprint $table) {
            $table->increments('accounts_sub_heads_id');
            $table->integer('accounts_heads_id')->nullable();
            $table->string('sub_head')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('is_deleted')->nullable();
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
