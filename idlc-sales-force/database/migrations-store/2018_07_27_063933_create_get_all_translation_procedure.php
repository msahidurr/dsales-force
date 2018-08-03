<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateGetAllTranslationProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
$sql = <<<SQL
DROP PROCEDURE IF EXISTS get_all_translation;
CREATE PROCEDURE get_all_translation ()  SELECT tr.*,tk.translation_key FROM mxp_translation_keys tk INNER JOIN mxp_translations tr ON(tr.translation_key_id=tk.translation_key_id)
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
        $sql = "DROP PROCEDURE IF EXISTS get_all_translation";
        DB::connection()->getPdo()->exec($sql);
    }
}
