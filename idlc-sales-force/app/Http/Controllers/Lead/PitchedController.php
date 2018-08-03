<?php

namespace App\Http\Controllers\lead;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class PitchedController extends Controller
{
    public function viewPitched(){
    	return view('lead.pitched.pitchedList');
    }
}
