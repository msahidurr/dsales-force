<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateGetChildMenuListProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
$sql = <<<SQL
DROP PROCEDURE IF EXISTS get_child_menu_list;
CREATE PROCEDURE get_child_menu_list (IN `p_parent_menu_id` INT(11), IN `role_id` INT(11), IN `comp_id` INT(11))  if(comp_id !='') then
SELECT m.* FROM mxp_user_role_menu rm inner JOIN mxp_menu m ON(m.menu_id=rm.menu_id) WHERE rm.role_id=role_id AND rm.company_id=comp_id AND m.parent_id=p_parent_menu_id order by m.order_id ASC;
else
SELECT m.* FROM mxp_user_role_menu rm inner JOIN mxp_menu m ON(m.menu_id=rm.menu_id) WHERE rm.role_id=role_id AND m.parent_id=p_parent_menu_id order by m.order_id ASC;
end if
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
        $sql = "DROP PROCEDURE IF EXISTS get_child_menu_list";
        DB::connection()->getPdo()->exec($sql);
    }
}
