<?php

namespace App\Http\Controllers\lead;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class ConvertedController extends Controller
{
    public function viewConverted(){
    	return view('lead.converted.convertedList');
    }
}
