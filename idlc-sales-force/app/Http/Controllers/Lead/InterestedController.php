<?php

namespace App\Http\Controllers\lead;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class InterestedController extends Controller
{
     public function viewInterested(){
    	return view('lead.interested.interestedList');
    }
}
