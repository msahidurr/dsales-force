<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateGetTranslationsByKeyIdProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
$sql = <<<SQL
DROP PROCEDURE IF EXISTS get_translations_by_key_id;
CREATE PROCEDURE get_translations_by_key_id (IN `key_id` INT)  select translation_id, translation, lan_code from mxp_translations
 where translation_key_id= `key_id` and is_active = 1
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
        $sql = "DROP PROCEDURE IF EXISTS get_translations_by_key_id";
        DB::connection()->getPdo()->exec($sql);
    }
}
