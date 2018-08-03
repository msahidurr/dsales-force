<?php

namespace App\Http\Controllers\ifa;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class ApprovedApplication extends Controller
{
    public function viewApprovedApp(){
    	$getListValue = DB::table('tbl_ifa_registrations')
    						->where('application_status',1)
                            // ->orderBy('id_organization','DESC')
                            ->paginate(25);
    	return view('ifa.approved_application.approvedAppList',compact('getListValue'));
    }
}
