<?php

namespace App\Http\Controllers\ifa;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class ApplicationProgress extends Controller
{
    public function viewApplicationProgress(){
    	$getListValue = DB::table('tbl_ifa_registrations')
    						->where('application_status',4)
                            // ->orderBy('id_organization','DESC')
                            ->paginate(25);
    	return view('ifa.application_in_progress.applicationProgressList',compact('getListValue'));
    }
}
