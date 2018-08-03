<?php

namespace App\Http\Controllers\lead;

use App\Http\Controllers\Message\ActionMessage;
use App\Model\Lead\InvestmentActionCreateLead;
use App\Model\ManagementSetting\Occupation;
use App\Http\Controllers\Controller;
use App\Model\Lead\CreateLead;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class CreateLeadController extends Controller
{
    public function viewCreateLeadList(){
                                    
        $getCreateLead = DB::table('tbl_create_lead as tcl')
                            ->select('tcl.*','tia.name')
                            ->Leftjoin('tbl_investment_action as tia','tcl.investment_action_id','tia.id_investment_action')
                            ->orderBy('tcl.id_create_lead','DESC')
                            ->paginate(15);                  
    	return view('lead.create_lead.createLeadList',compact('getCreateLead'));
    }

    public function addLeadview(){
    	$getOccupation = Occupation::get();
    	$getInvestmentAction = InvestmentActionCreateLead::get();
    	return view('lead.create_lead.add_create_lead',compact('getOccupation','getInvestmentAction'));
    }

    public function editLeadView(InvestmentActionCreateLead $object,$id){
        $getOccupation = Occupation::get();
        $getInvestmentAction = InvestmentActionCreateLead::get();
        
        // $getLeadValue = $object->select('tcl.*','name')
        //                 ->join('tbl_create_lead as tcl','tcl.investment_action_id','id_investment_action')
        //                 ->where('tcl.id_create_lead',$id)             
        //                 ->get();
        $getLeadValue = DB::table('tbl_create_lead')->select('tbl_create_lead.*')
        ->where('id_create_lead',$id)             
        ->get();
        // return $getLeadValue;
    	return view('lead.create_lead.edit_create_lead',compact('getOccupation','getInvestmentAction','getLeadValue'));
    }

    public function storeLead(Request $request){
        $datas = $request->all();
        // $this->print_me($request->lead_type);
    	$validMessages = [
            'personal_name.required' => 'Name field is required.',
            'contact_no.required' => 'Contact no field is required.',
            'contact_no.numeric' => 'Invalid contact number.',
            'contact_no.min' => 'Minimum 11 digit.',
            'contact_no.regex' => 'Invalid Contact number (01).',
            'area.required' => 'Contact no field is required.',
            'investment_date.required' => 'Date field is required.',
            'investment_action.required' => 'Action field is required.',
            'lead_assign.required' => 'Lead Assign field is required.',
            ];
        $validator = Validator::make($datas, 
            [
                'personal_name' => 'required',
                'contact_no' => 'required|numeric|min:11|regex:/(01)[0-9]{9}/',
                'area' => 'required',
                'investment_date' => 'required',
                'investment_action' => 'required',
                'lead_assign' => 'required',
            ],
            $validMessages
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator->messages());
        }

        $validationError = $validator->messages();
        $storeleads = new CreateLead();
        $storeleads->user_id = Auth::user()->user_id;
        $storeleads->lead_number = $this->leadUniqueNumber();
        $storeleads->reference_number = $this->referenceNumber();
        $storeleads->lead_type = $request->lead_type;
        $storeleads->lead_assign = $request->lead_assign;
        $storeleads->assign_ifa_register_name = $request->assign_ifa_register_name;
        $storeleads->personal_name = $request->personal_name;
        $storeleads->contact_no = $request->contact_no;
        $storeleads->email = $request->email;
        $storeleads->area = $request->area;
        $storeleads->occupation_id = $request->occupation;
        $storeleads->investment_name = $request->investment_name;
        $storeleads->investment_type = $request->investment_type;
        $storeleads->follow_up_date = $request->investment_date;
        $storeleads->contact_status = $request->contact_status;
        $storeleads->interest_label = $request->interest_label;
        $storeleads->investment_action_id = $request->investment_action;
        $storeleads->remark_or_comment = trim($request->remark_or_comment);
        $storeleads->save();

        return \Redirect()->Route('create_lead_view');
    }
    public function updateLead(Request $request){
        $datas = $request->all();
        // $this->print_me($datas);
        $validMessages = [
            'personal_name.required' => 'Name field is required.',
            'contact_no.required' => 'Contact no field is required.',
            'contact_no.numeric' => 'Invalid contact number.',
            'contact_no.min' => 'Minimum 11 digit.',
            'contact_no.regex' => 'Invalid Contact number (01).',
            'area.required' => 'Contact no field is required.',
            'investment_date.required' => 'Date field is required.',
            'investment_action.required' => 'Action field is required.',
            'lead_assign.required' => 'Lead Assign field is required.',
            ];
        $validator = Validator::make($datas, 
            [
                'personal_name' => 'required',
                'contact_no' => 'required|numeric|min:11|regex:/(01)[0-9]{9}/',
                'area' => 'required',
                'investment_date' => 'required',
                'investment_action' => 'required',
                'lead_assign' => 'required',
            ],
            $validMessages
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator->messages());
        }

        $validationError = $validator->messages();
        $updateleads = CreateLead::find($request->id);
        $updateleads->user_id = Auth::user()->user_id;
        $updateleads->lead_number = $this->leadUniqueNumber();
        $updateleads->reference_number = $this->referenceNumber();
        $updateleads->lead_type = $request->lead_type;
        $updateleads->lead_assign = $request->lead_assign;
        $updateleads->assign_ifa_register_name = $request->assign_ifa_register_name;
        $updateleads->personal_name = $request->personal_name;
        $updateleads->contact_no = $request->contact_no;
        $updateleads->email = $request->email;
        $updateleads->area = $request->area;
        $updateleads->occupation_id = $request->occupation;
        $updateleads->investment_name = $request->investment_name;
        $updateleads->investment_type = $request->investment_type;
        $updateleads->follow_up_date = $request->investment_date;
        $updateleads->contact_status = $request->contact_status;
        $updateleads->interest_label = $request->interest_label;
        $updateleads->investment_action_id = $request->investment_action;
        $updateleads->remark_or_comment = trim($request->remark_or_comment);
        $updateleads->save();

        return \Redirect()->Route('create_lead_view');
    }

    private function leadUniqueNumber(){
        $CountValue = CreateLead::count();
        $organizationId = str_pad($CountValue + 1, 3, 1000, STR_PAD_LEFT);

        return $organizationId;
    }

    private function referenceNumber(){
        $CountValue = CreateLead::count();
        $organizationId = str_pad($CountValue + 1, 3, 1000, STR_PAD_LEFT);
        $number = uniqid().$organizationId ;
        return $number;
    }
}
