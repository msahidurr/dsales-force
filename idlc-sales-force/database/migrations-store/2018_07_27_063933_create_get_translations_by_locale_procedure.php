<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateGetTranslationsByLocaleProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
$sql = <<<SQL
DROP PROCEDURE IF EXISTS get_translations_by_locale;
CREATE PROCEDURE get_translations_by_locale (IN `locale_code` VARCHAR(255))  SELECT tr.translation,tk.translation_key FROM mxp_translation_keys tk INNER JOIN mxp_translations tr ON(tr.translation_key_id=tk.translation_key_id)
WHERE tr.lan_code=locale_code
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
        $sql = "DROP PROCEDURE IF EXISTS get_translations_by_locale";
        DB::connection()->getPdo()->exec($sql);
    }
}
