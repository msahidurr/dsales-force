<?php

namespace App\Model\ManagementSetting;

use Illuminate\Database\Eloquent\Model;
use App\Model\ManagementSetting\ExamName;

class ExamDetails extends Model
{

    public function examName(){
        return $this->hasOne(ExamName::class, 'id_exam_name', 'exam_name_id');
    }
}
