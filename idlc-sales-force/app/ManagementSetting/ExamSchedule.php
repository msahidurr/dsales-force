<?php

namespace App\ManagementSetting;

use Illuminate\Database\Eloquent\Model;
use App\Model\ManagementSetting\ExamName;

class ExamSchedule extends Model
{

    public function examName(){
        return $this->hasOne(ExamName::class, 'id_exam_name', 'exam_name_id');
    }
}
