<?php

namespace App\Http\Controllers\salesAgent;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class SalesApprovedApplication extends Controller
{
    public function viewSalesApprovedApp(){
    	return view('sales_agent.approved_application.approvedAppList');
    }
}
