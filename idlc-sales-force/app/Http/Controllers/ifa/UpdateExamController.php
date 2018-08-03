<?php

namespace App\Http\Controllers\ifa;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class UpdateExamController extends Controller
{
    public function viewUpdateExam(){
    	return view('ifa.update_exam_info.updateExamInfoList');
    }
}
