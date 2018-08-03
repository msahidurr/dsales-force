<?php

namespace App\Model\Lead;

use App\Model\Lead\CreateLead;
use Illuminate\Database\Eloquent\Model;

class InvestmentActionCreateLead extends Model
{
    protected $table = "tbl_investment_action";
    protected $primaryKey = "id_investment_action";

	protected $fillable = ['name','value'];

	public function belongsTos(){
		return $this->hasOne(CreateLead::Class,'investment_action_id','id_investment_action');
	}
}
