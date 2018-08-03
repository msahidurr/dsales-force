<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{	
	protected $table = 'tbl_user_type';
    protected $primaryKey = 'id_user_type';

    protected $fillable = ['user_id','user_type','is_active','last_action','is_deleted'];
}
