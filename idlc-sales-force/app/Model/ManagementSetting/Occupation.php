<?php

namespace App\Model\ManagementSetting;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $table = "tbl_new_occupation";
    protected $primaryKey = "id_occupation";
    protected $fillable = ['occupation'];
}
