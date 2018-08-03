<?php

namespace App\Http\Controllers\Lead;

use App\Model\Lead\InvestmentActionCreateLead;
use App\Model\ManagementSetting\Occupation;
use App\Http\Controllers\Controller;
use App\Model\Lead\CreateLead;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class LeadDetailsView extends Controller
{

    public function detailsView(InvestmentActionCreateLead $object,$id){
        $getOccupation = Occupation::get();
        $getInvestmentAction = InvestmentActionCreateLead::get();
    	// $getLeadValue = $object->select('tcl.*','name')
     //                ->join('tbl_create_lead as tcl','tcl.investment_action_id','id_investment_action')
     //                ->where('tcl.id_create_lead',$id)             
     //                ->get();

        $getLeadValue = DB::table('tbl_create_lead')->select('tbl_create_lead.*')
        ->where('id_create_lead',$id)             
        ->get();
        
    	return view('lead.create_lead.lead_view_page',compact('getLeadValue','getOccupation','getInvestmentAction'));
    }

    public function emptys($value){
    	$value = (empty($value)) ? "Empty" :$value;
    	return $value;
    }

    public function valueCheck($value,$check){

        if(isset($value) && ($value == $check)){
          $data = "selected";
        }else{
            $data = "";
        }
        return $data; 
    }
    public function valueCheckV($value,$check){

        if(isset($value) && ($value == $check)){
          $data = "selected";
        }else{
            $data = "class='hidden'";
        }
        return $data; 
    }
}
