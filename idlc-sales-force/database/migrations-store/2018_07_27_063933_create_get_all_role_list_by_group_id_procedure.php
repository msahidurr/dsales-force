<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateGetAllRoleListByGroupIdProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
$sql = <<<SQL
DROP PROCEDURE IF EXISTS get_all_role_list_by_group_id;
CREATE PROCEDURE `get_all_role_list_by_group_id` (IN `grp_id` INT(11))  SELECT GROUP_CONCAT(DISTINCT(c.name)) as c_name,r.* FROM mxp_role r join mxp_companies c on(c.id=r.company_id)
where c.group_id=grp_id GROUP BY r.cm_group_id
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
        $sql = "DROP PROCEDURE IF EXISTS get_all_role_list_by_group_id";
        DB::connection()->getPdo()->exec($sql);
    }
}
