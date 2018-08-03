<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Message\ActionMessage;
use App\Model\Lead\InvestmentActionCreateLead;
use App\Model\ManagementSetting\Occupation;
use App\Http\Controllers\Controller;
use App\Model\Lead\CreateLead;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use Auth;
use DB;

class LeadSearchController extends Controller
{

	public function getLeadAllValue(Request $request){

        $object = new InvestmentActionCreateLead();
        $data = $this->getALLValue($object);

        return json_encode($data);
    }

    public function getIfaValue(Request $request){

        $results = array();
        $orderDetails = DB::select("SELECT application_no,first_name FROM tbl_ifa_registrations order by application_no DESC ");

        if(isset($orderDetails) && !empty($orderDetails)){
            foreach ($orderDetails as $orderKey => $orderValue) {
                $results[]['name'] = $orderValue->application_no.'-'.$orderValue->first_name;
                // $results[]['application_no'] = $orderValue->application_no;
            }
        }

      return json_encode($results);
    }

    public function getLeadSearchValue(Request $request){
    	$values = $request->all();

        $object = new InvestmentActionCreateLead();

        if(!empty($request->sortbyValues) && empty($request->selectedOptionValues) && empty($request->formDateValues) && empty($request->toDateValues)){

            $data = $this->searchByAscDsc($values,$object);

        }
        else if(!empty($request->selectedOptionValues) && empty($request->formDateValues) && empty($request->toDateValues))
        {
            $data = $this->searchByFirstOption($values,$object);
                
        }else if(!empty($request->selectedOptionValues) && !empty($request->formDateValues) && empty($request->toDateValues)){

            $data = $this->searchByFristAndFrom($values,$object);

        }else if(empty($request->selectedOptionValues) && !empty($request->formDateValues) && empty($request->toDateValues)){

        	$data = $this->searchByFromCurrentDate($values,$object);
        }
        else if(empty($request->selectedOptionValues) && !empty($request->formDateValues) && !empty($request->toDateValues)){

        	$data = $this->searchByFromAndTo($values,$object);

            
        }else{

            $data = $this->searchByALl($values,$object);
        }

        return json_encode($data);
    }

    private function getALLValue($object){
        // $data = $object->orderBy('tcl.id_create_lead','DESC')
        //             ->select('tcl.*','name')
        //             ->join('tbl_create_lead as tcl','tcl.investment_action_id','id_investment_action')                  
        //             ->get();
    $data = DB::table('tbl_create_lead')->select('tbl_create_lead.*')
        ->orderBy('created_at',"DESC")
        ->get();
        return $data;
    }

    private function searchByAscDsc($value = [],$object){
    	$data = $object->orderBy('tcl.id_create_lead',$value['sortbyValues'])
            		->select('tcl.*','name')
                    ->join('tbl_create_lead as tcl','tcl.investment_action_id','id_investment_action')                  
                    ->get();
        return $data;
    }

    private function searchByFirstOption($value = [],$object){

    	$data = $object->select('tcl.*','name')
                    ->join('tbl_create_lead as tcl','tcl.investment_action_id','id_investment_action')
            		->where('tcl.interest_label',$value['selectedOptionValues'])
                    ->orderBy('tcl.id_create_lead',(!empty($value['sortbyValues']) ? $value['sortbyValues'] : "ASC"))
                    ->get();
        return $data;
    }

    private function searchByFristAndFrom($value = [],$object){
    	$data = $object->select('tcl.*','name')
                    ->join('tbl_create_lead as tcl','tcl.investment_action_id','id_investment_action')
            		->whereDate('tcl.created_at','>=',date($value['formDateValues']))
                    ->whereDate('tcl.created_at','<=',Carbon::now()->format('Ymd'))
                    ->where('tcl.interest_label',$value['selectedOptionValues'])
                    ->orderBy('tcl.id_create_lead',(!empty($value['sortbyValues']) ? $value['sortbyValues'] : "ASC"))
                    ->get();
    	return $data;
    }

    private function searchByFromCurrentDate($value = [],$object){
    	$data = $object->select('tcl.*','name')
                    ->join('tbl_create_lead as tcl','tcl.investment_action_id','id_investment_action')
            		->whereDate('tcl.created_at','>=',date($value['formDateValues']))
                    ->whereDate('tcl.created_at','<=',Carbon::now()->format('Ymd'))
                    ->orderBy('tcl.id_create_lead',(!empty($value['sortbyValues']) ? $value['sortbyValues'] : "ASC"))
                    ->get();
    	return $data;
    }

    private function searchByFromAndTo($value = [],$object){
    	$data = $object->select('tcl.*','name')
                    ->join('tbl_create_lead as tcl','tcl.investment_action_id','id_investment_action')
            		->whereDate('tcl.created_at','>=',date($value['formDateValues']))
                    ->whereDate('tcl.created_at','<=',date($value['toDateValues']))
                    ->orderBy('id_create_lead',(!empty($value['sortbyValues']) ? $value['sortbyValues'] : "ASC"))
                    ->get();

    	return $data;
    }

    private function searchByALl($value = [],$object){
    	$data = $object->select('tcl.*','name')
                    ->join('tbl_create_lead as tcl','tcl.investment_action_id','id_investment_action')
            		->whereDate('tcl.created_at','>=',date($value['formDateValues']))
                    ->whereDate('tcl.created_at','<=',date($value['toDateValues']))
                    ->where('tcl.interest_label',$value['selectedOptionValues'])
                    ->orderBy('tcl.id_create_lead',(!empty($value['sortbyValues']) ? $value['sortbyValues'] : "ASC"))
                    ->get();
        return $data;
    }
}
