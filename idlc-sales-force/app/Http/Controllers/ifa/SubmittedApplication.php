<?php

namespace App\Http\Controllers\ifa;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class SubmittedApplication extends Controller
{
    public function viewSubmittedList(){
    	$getListValue = DB::table('tbl_ifa_registrations')
    						->where('application_status',3)
                            // ->orderBy('id_organization','DESC')
                            ->paginate(25);
    	return view('ifa.submitted_application.submittedApplication',compact('getListValue'));
    }
}
