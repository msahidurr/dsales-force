<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateGetAllTranslationWithLimitProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
$sql = <<<SQL
DROP PROCEDURE IF EXISTS get_all_translation_with_limit;
CREATE PROCEDURE get_all_translation_with_limit (IN `startedAt` INT(11), IN `limits` INT(11))  SELECT tr.*,tk.translation_key, ml.lan_name FROM mxp_translation_keys tk INNER JOIN
 mxp_translations tr ON(tr.translation_key_id=tk.translation_key_id) 
 INNER JOIN mxp_languages ml ON(ml.lan_code=tr.lan_code)order by tk.translation_key_id desc limit startedAt,limits
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
        $sql = "DROP PROCEDURE IF EXISTS get_all_translation_with_limit";
        DB::connection()->getPdo()->exec($sql);
    }
}
