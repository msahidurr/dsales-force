<?php

namespace App\ManagementSetting;

use Illuminate\Database\Eloquent\Model;
use App\Model\ManagementSetting\ApplicantTraining;

class ApprovedExameen extends Model
{
    public function exameen(){
        return $this->hasOne(ApplicantTraining::class, 'application_no', 'applicant_no')->where('training_status', 'TrainingPass')->orWhere('training_status', 'InExam')->orWhere('training_status', 'Fail')->orWhere('training_status', 'Pass');
    }
}
