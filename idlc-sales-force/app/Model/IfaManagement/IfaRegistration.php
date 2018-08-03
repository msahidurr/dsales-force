<?php

namespace App\Model\IfaManagement;

use Illuminate\Database\Eloquent\Model;

class IfaRegistration extends Model
{
    protected $table = "tbl_ifa_registrations";
    protected $primaryKey = "application_no";

    protected $fillable = ['ifa_reg_id', 'application_no', 'application_status', 'user_name', 'first_name', 'middle_name', 'last_name', 'mobile_no', 'email', 'father_name', 'mother_name', 'nationality', 'date_of_birth', 'national_id_card_no','bank_branch_id', 'bank_account_no', 'bKash_acc_type', 'bKash_mobile_no', 'training_status', 'student_department', 'is_same_as_present_address', 'others_nationality',];
}
