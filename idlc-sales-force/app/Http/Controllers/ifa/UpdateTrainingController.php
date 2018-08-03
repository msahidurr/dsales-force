<?php

namespace App\Http\Controllers\ifa;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class UpdateTrainingController extends Controller
{
    public function viewUpdateTraining(){
    	return view('ifa.update_training.updateTrainingList');
    }
}
