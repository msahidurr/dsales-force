<?php

namespace App\Http\Controllers\lead;

use App\Http\Controllers\Message\ActionMessage;
use App\Model\ManagementSetting\Occupation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class BulkUploadController extends Controller
{
    public function bulkUploadView(){
    	return view('lead.bulk_upload.viewBulkUpload');
    }

    public function storeBulk(Request $request){
    	return view('lead.bulk_upload.viewBulkUpload');
    }
}
