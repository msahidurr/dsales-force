<?php

namespace App\Model\ManagementSetting;

use Illuminate\Database\Eloquent\Model;
use App\Model\Bank;
use App\Model\Branch;
use App\Model\District;
use App\Model\Divisions;
use App\Model\Nationality;
use App\Model\UserType;
use App\Model\PremiseOwnership;

class ApplicantTraining extends Model
{
    protected $table = 'tbl_ifa_registrations';
    protected $primaryKey = 'application_no';

   protected $fillable = ['ifa_reg_id', 'application_no', 'application_status', 'first_name', 'middle_name',
       'last_name', 'mobile_no', 'email', 'father_name', 'nationality', 'national_id_card_no', 'is_active',
       'is_delete', 'image_ext', 'latest_degree', 'is_job_holder', 'employee_id_no', 'designation', 'is_student',
       'training_status', 'others_nationality', 'others_user_type', 'user_type_id'];
//    protected $fillable = ['ifa_reg_id', 'application_no', 'application_status', 'first_name'];

    public function nationality_info(){
        return $this->hasOne(Nationality::class, 'id_nationality','nationality');
    }

    public function pre_district(){
        return $this->hasOne(District::class, 'district_id','pre_addr_district_id');
    }

    public function pre_division(){
        return $this->hasOne(Divisions::class, 'division_id','pre_addr_division_id');
    }

    public function per_district(){
        return $this->hasOne(District::class, 'district_id','per_addr_district_id');
    }

    public function per_division(){
        return $this->hasOne(Divisions::class, 'division_id','per_addr_division_id');
    }

    public function bank(){
        return $this->hasOne(Bank::class, 'bank_id','bank_id');
    }

    public function branch(){
        return $this->hasOne(Branch::class, 'branch_id','bank_branch_id');
    }

    public function user_type(){
        return $this->hasOne(UserType::class, 'id_user_type','user_type_id');
    }

    public function premise_ownership(){
        return $this->hasOne(PremiseOwnership::class, 'id_premise_ownership','pre_addr_premise_ownership');
    }

    public function permise_ownership(){
        return $this->hasOne(PremiseOwnership::class, 'id_premise_ownership','per_addr_premise_ownership');
    }
}
