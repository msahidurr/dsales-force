<?php

namespace App\Http\Controllers\lead;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class ConversionRatioController extends Controller
{
    public function viewConversionRatio(){
    	return view('lead.conversion_ratio.conversionRatioList');
    }
}
