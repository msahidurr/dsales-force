<?php

namespace App\Http\Controllers\lead;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class HighlyInterestedController extends Controller
{
    public function viewHighlyInterested(){
    	return view('lead.highly_interested.higlyInterestedList');
    }
}
