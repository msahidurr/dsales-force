<?php

namespace App\Http\Controllers\lead;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class UnassignedController extends Controller
{
    public function viewUnassigned(){
    	return view('lead.unassigned.unassignedList');
    }
}
