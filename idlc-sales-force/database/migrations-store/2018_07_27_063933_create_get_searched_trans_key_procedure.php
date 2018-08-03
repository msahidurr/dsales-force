<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateGetSearchedTransKeyProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
$sql = <<<SQL
DROP PROCEDURE IF EXISTS get_searched_trans_key;
CREATE PROCEDURE get_searched_trans_key (IN `_key` VARCHAR(255))  SELECT distinct(tk.translation_key),tk.translation_key_id, tk.is_active FROM mxp_translation_keys tk
 inner join mxp_translations tr on(tk.translation_key_id = tr.translation_key_id)
 WHERE tk.translation_key LIKE CONCAT('%', _key , '%')
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
        $sql = "DROP PROCEDURE IF EXISTS get_searched_trans_key";
        DB::connection()->getPdo()->exec($sql);
    }
}
