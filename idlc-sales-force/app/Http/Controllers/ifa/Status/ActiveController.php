<?php

namespace App\Http\Controllers\ifa\Status;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class ActiveController extends Controller
{
    public function viewActive(){
    	return view('ifa.status.active.activeList');
    }
}
