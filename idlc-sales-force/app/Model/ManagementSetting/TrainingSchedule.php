<?php

namespace App\Model\ManagementSetting;

use Illuminate\Database\Eloquent\Model;
use App\Model\ManagementSetting\TrainingName;

class TrainingSchedule extends Model
{

    public function trainingName(){
        return $this->hasOne(TrainingName::class, 'id_training_name', 'training_name_id');
    }
}
