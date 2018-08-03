<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateGetRolesByCompanyIdProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
$sql = <<<SQL
DROP PROCEDURE IF EXISTS get_roles_by_company_id;
CREATE PROCEDURE get_roles_by_company_id (IN `cmpny_id` INT(11), IN `cm_grp_id` INT(11))  SELECT rl.name as roleName, cm.name as companyName, cm.id as company_id, rl.cm_group_id, rl.is_active FROM mxp_role rl INNER JOIN mxp_companies cm ON(rl.company_id=cm.id) where cm.group_id = `cmpny_id` and rl.cm_group_id = `cm_grp_id`
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
        $sql = "DROP PROCEDURE IF EXISTS get_roles_by_company_id";
        DB::connection()->getPdo()->exec($sql);
    }
}
