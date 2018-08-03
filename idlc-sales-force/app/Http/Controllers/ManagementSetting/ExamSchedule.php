<?php

namespace App\Http\Controllers\ManagementSetting;

use App\Http\Controllers\Message\ActionMessage;
use App\Model\ManagementSetting\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use App\Model\ManagementSetting\ExamName;
use App\ManagementSetting\ExamSchedule as ExamScheduleDetails;
use App\Http\Controllers\ManagementSetting\ExameenManagement;
use App\Model\ManagementSetting\TrainingSchedule;
use Session;
class ExamSchedule extends Controller
{
    public function viewExamSchedule(){

        // $trainingList = TrainingSchedule::::with('trainingName')->get();
        $examList = ExamScheduleDetails::with('examName')->get();
        // echo "<pre>";
        // print_r($examList[2]->examName['name']);
        // die();
    	return view('management_setting.exam_schedule.examScheduleList', compact('trainingList', 'examList'));
    }

    public function scheduleCreateForm(){

        $trainingList = TrainingSchedule::with('trainingName')->where('is_complete', 0)->get();
        $examNames = ExamName::where('is_active', '1')->get();
// //        return $trainingList;
        return view('management_setting.exam_schedule.create_exam_schedule', compact('trainingList', 'examNames'));
    }

    public function scheduleCreate(Request $req){


        $allInput = $req->all();
        $examSche = new ExamScheduleDetails();

        $examSche->exam_name_id = $allInput['exam_name_id'];
        $examSche->training_schedule_id = $allInput['training_name'];
        // $examSche->exam_schedule_name = $allInput['exam_schedule_name'];
        // $examSche->description = $allInput['description'];
        $examSche->date = $allInput['date'];
        $examSche->start_time = $allInput['start_time'];
        $examSche->end_time = $allInput['end_time'];
        $examSche->is_complete = 0;
        $examSche->save();
        $examScheId = $examSche->id;

        $exameen = new ExameenManagement();
        $exameen->setExameenSchedule($req, $examScheId);

        Session::flash('exam_status','Exam schedule created successfully.');
        Session::flash('alert-class','alert-success');

        return redirect()->route('exam_schedule_view');
    }

    public function examScheduleUpdateView(Request $req){

//        return $req->all();

        $trainingList = TrainingSchedule::with('trainingName')->where('is_complete', 0)->get();
        $examNames = ExamName::where('is_active', '1')->get();

        $examSchedule = ExamScheduleDetails::where('id', $req->schedule_id)->first();

        return view('management_setting.exam_schedule.update_exam_schedule', compact('examSchedule','trainingList','examNames'));

    }

    public function examScheduleUpdateAction(Request $req){

        $allInput = $req->all();

        $examSche = ExamScheduleDetails::find($req->schedule_id);

        $examSche->exam_name_id = $allInput['exam_name_id'];
        $examSche->training_schedule_id = $allInput['training_name'];
        // $examSche->exam_schedule_name = $allInput['exam_schedule_name'];
        // $examSche->description = $allInput['description'];
        $examSche->date = $allInput['date'];
        $examSche->start_time = $allInput['start_time'];
        $examSche->end_time = $allInput['end_time'];
        $examSche->is_complete = 0;
        $examSche->save();

        return redirect()->route('exam_schedule_view');
    }

}
