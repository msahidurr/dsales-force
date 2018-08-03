<?php

namespace App\Http\Controllers\ManagementSetting;

use App\Http\Controllers\Message\ActionMessage;
use App\Model\ManagementSetting\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class NewOrganization extends Controller
{
    public function viewNewOrganization(){
    	$getListValue = DB::table('tbl_new_organization')
                            ->orderBy('id_organization','DESC')
                            ->paginate(15);
    	return view('management_setting.new_organization.newOrganizationList',compact('getListValue'));
    }

    public function addNewOrganization(){
    	return view('management_setting.new_organization.addNewOrganization');
    }
    public function editOrganization($id){
    	$editValue = DB::table('tbl_new_organization')->where('id_organization',$id)->get();
    	// $editValue = Organization::find($id);
    	return view('management_setting.new_organization.editNewOrganization',compact('editValue'));
    }

    public function storeOrganization(Request $request){
        
        $datas = $request->all();
    	$validMessages = [
            'organization_name.required' => 'Organization Name field is required.',
            'contact_person_name.required' => 'Contact Person Name field is required.',
            'contact_person_no.required' => 'Contact Person No field is required.',
            'address.required' => 'address field is required.',
            ];
        $validator = Validator::make($datas, 
            [
                'organization_name' => 'required',
                'contact_person_name' => 'required',
                'contact_person_no' => 'required',
                'address' => 'required',
            ],
            $validMessages
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator->messages());
        }

        /** Genarate value id 3 digit start 101 **/

        $CountValue = Organization::count();
        $organizationId = str_pad($CountValue + 1, 3, 100, STR_PAD_LEFT);

        /** End Section **/

        $validationError = $validator->messages();
        $storeNewOrganization = new Organization();
        $storeNewOrganization->id_organization = $organizationId;
        $storeNewOrganization->user_id = Auth::user()->user_id;
        $storeNewOrganization->organization_name = $request->organization_name;
        $storeNewOrganization->contact_person_name = $request->contact_person_name;
        $storeNewOrganization->contact_person_no = $request->contact_person_no;
        $storeNewOrganization->address = $request->address;
        $storeNewOrganization->is_active = $request->isActive;
        $storeNewOrganization->last_action = ActionMessage::CREATE;
        $storeNewOrganization->save();

        return \Redirect()->Route('organization_view');
    }

    public function updateOrganization(Request $request,$id){
        
        $datas = $request->all();
    	$validMessages = [
            'organization_name.required' => 'Organization Name field is required.',
            'contact_person_name.required' => 'Contact Person Name field is required.',
            'contact_person_no.required' => 'Contact Person No field is required.',
            'address.required' => 'address field is required.',
            ];
        $validator = Validator::make($datas, 
            [
                'organization_name' => 'required',
                'contact_person_name' => 'required',
                'contact_person_no' => 'required',
                'address' => 'required',
            ],
            $validMessages
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator->messages());
        }

        $validationError = $validator->messages();
        $storeNewOrganization = Organization::find($id);
        $storeNewOrganization->user_id = Auth::user()->user_id;
        $storeNewOrganization->organization_name = $request->organization_name;
        $storeNewOrganization->contact_person_name = $request->contact_person_name;
        $storeNewOrganization->contact_person_no = $request->contact_person_no;
        $storeNewOrganization->address = $request->address;
        $storeNewOrganization->is_active = $request->isActive;
        $storeNewOrganization->last_action = ActionMessage::UPDATE;
        $storeNewOrganization->save();

        return \Redirect()->Route('organization_view');
    }
}
