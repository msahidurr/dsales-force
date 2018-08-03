<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblNewOrganization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_new_organization', function (Blueprint $table) {
		$table->increments('id_org');

            $table->integer('id_organization');
            $table->integer('user_id')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_no')->nullable();
            $table->string('address')->nullable();
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
