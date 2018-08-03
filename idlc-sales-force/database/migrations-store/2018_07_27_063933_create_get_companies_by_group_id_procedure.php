<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateGetCompaniesByGroupIdProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
$sql = <<<SQL
DROP PROCEDURE IF EXISTS get_companies_by_group_id;
CREATE PROCEDURE get_companies_by_group_id (IN `grp_id` INT(11))  select * from mxp_companies where group_id=grp_id and is_active = 1
SQL;
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = "DROP PROCEDURE IF EXISTS get_companies_by_group_id";
        DB::connection()->getPdo()->exec($sql);
    }
}
