<?php

namespace App\Http\Controllers\ifa;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class RejectedApplication extends Controller
{
    public function viewRejectedApplication(){
    	$getListValue = DB::table('tbl_ifa_registrations')
    						->where('application_status',5)
                            // ->orderBy('id_organization','DESC')
                            ->paginate(25);
    	return view('ifa.rejected_application.rejectedApplicationList',compact('getListValue'));
    }
}
