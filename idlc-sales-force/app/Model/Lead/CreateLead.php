<?php

namespace App\Model\Lead;

use App\Model\Lead\InvestmentActionCreateLead;
use Illuminate\Database\Eloquent\Model;

class CreateLead extends Model
{	
	protected $table = "tbl_create_lead";
    protected $primaryKey = "id_create_lead";   
	protected $fillable = [
						'lead_number',
						'lead_type',
						'reference_number',
						'personal_name',
						'contact_no',
						'email',
						'area',
						'occupation_id',
						'investment_name',
						'investment_type',
						'follow_up_date',
						'contact_status',
						'interest_label',
						'investment_action_id',
						'remark_or_comment',
						'last_action'
					];

}
