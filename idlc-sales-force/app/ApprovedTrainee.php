<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Model\ManagementSetting\ApplicantTraining;
class ApprovedTrainee extends Model
{
    protected $fillable = ['id', 'training_schedule_id', 'applicant_no', 'training_required]'];

    public function trainee(){
        return $this->hasOne(ApplicantTraining::class, 'application_no', 'applicant_no')->where('application_status', 'InProgress');
    }

    public function pass_trainee(){
        return $this->hasOne(ApplicantTraining::class, 'application_no', 'applicant_no')->where('training_status', 'TrainingPass')->orWhere('training_status', 'Pass')->orWhere('training_status', 'Fail');
    }
}
