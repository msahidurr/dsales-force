<?php

namespace App\Http\Controllers\ManagementSetting;

use  App\Http\Controllers\Message\ActionMessage;
use App\Model\ManagementSetting\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use App\Model\ManagementSetting\TrainingName;

use App\Model\ManagementSetting\TrainingSchedule as TrainingDetails;


class TrainingSchedule extends Controller
{

    public function viewTrainingSche(){

        $trainingSchedule = TrainingDetails::with('trainingName')->get();
    	return view('management_setting.training_schedule.trainingScheduleList', compact('trainingSchedule'));
    }

    public function trainingScheduleCreateView(){

        $applicantList = new ApplicantTrainingManagement();
        $applicants = $applicantList->applicantList('InProgress');

        $trainingNames = TrainingName::where('is_active', '1')->get();


        return view('management_setting.training_schedule.create_training_schedule', compact('trainingNames','applicants'));
    }

    public function trainingScheduleCreateAction(Request $req){



        $allInput = $req->all();
        unset($allInput['_token']);

        $trainingSch = new TrainingDetails();

        $trainingSch->training_name_id = $allInput['training_name_id'];
        $trainingSch->training_schedule_name = '0';
        $trainingSch->start_date = $allInput['start_date'];
        $trainingSch->end_date = $allInput['end_date'];
        $trainingSch->start_time = $allInput['start_time'];
        $trainingSch->end_time = $allInput['end_time'];
        $trainingSch->is_active = 0;
        $trainingSch->is_delete = 0;
        $trainingSch->is_complete = 0;
        $trainingSch->save();
        $trainingScheId = $trainingSch->id;

        $traineeApp = new ApplicantTrainingManagement();

        $traineeApp->setTraineeSchedule($req, $trainingScheId);

        \Session::flash('exam_status','Training schedule created successfully.');
        \Session::flash('alert-class','alert-success');

        return redirect()->route('training_schedule_view');
    }

    public function trainingScheduleUpdateView(Request $req){

        $trainingSchedule = TrainingDetails::with('trainingName')->where('id', $req->schedule_id)->first();
        $trainingNames = TrainingName::where('is_active', '1')->get();

        return view('management_setting.training_schedule.update_training_schedule', compact('trainingNames','trainingSchedule'));
    }

    public function trainingScheduleUpdateAction(Request $req){

        $allInput = $req->all();

        $trainingSch = TrainingDetails::find($req->schedule_id);
        $trainingSch->training_name_id = $allInput['training_name_id'];
        $trainingSch->training_schedule_name = '0';
        $trainingSch->start_date = $allInput['start_date'];
        $trainingSch->end_date = $allInput['end_date'];
        $trainingSch->start_time = $allInput['start_time'];
        $trainingSch->end_time = $allInput['end_time'];
        $trainingSch->is_active = 0;
        $trainingSch->is_delete = 0;
        $trainingSch->is_complete = 0;
        $trainingSch->save();

        \Session::flash('exam_status','Training schedule updated successfully.');
        \Session::flash('alert-class','alert-success');

        return redirect()->route('training_schedule_view');
    }
}

