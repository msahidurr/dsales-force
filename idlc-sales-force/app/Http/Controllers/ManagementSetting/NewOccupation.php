<?php

namespace App\Http\Controllers\ManagementSetting;

use App\Http\Controllers\Message\ActionMessage;
use App\Model\ManagementSetting\Occupation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class NewOccupation extends Controller
{
    public function viewNewOccupationList(){
        $getListValue = DB::table('tbl_new_occupation')
                            ->orderBy('id_occupation','DESC')
                            ->paginate(15);
    	return view('management_setting.new_occupation.newOccupationList',compact('getListValue'));
    }

    public function addNewOccupation(){
    	return view('management_setting.new_occupation.addNewOccupation');
    }
    public function editOccupation($id){
    	$editValue = DB::table('tbl_new_occupation')->where('id_occupation',$id)->get();
    	return view('management_setting.new_occupation.editNewOccupation',compact('editValue'));
    }

    public function storeOccupation(Request $request){
        
        $datas = $request->all();
    	$validMessages = [
            'occupation.required' => 'Occupation field is required.'
            ];
        $validator = Validator::make($datas, 
            [
                'occupation' => 'required'
            ],
            $validMessages
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator->messages());
        }

        $validationError = $validator->messages();
        $storeOccupation = new Occupation();
        $storeOccupation->user_id = Auth::user()->user_id;
        $storeOccupation->occupation = $request->occupation;
        $storeOccupation->is_active = $request->isActive;
        $storeOccupation->last_action = ActionMessage::CREATE;
        $storeOccupation->save();

        return \Redirect()->Route('new_occupation_view');
    }

    public function updateOccupation(Request $request,$id){
        
        $datas = $request->all();
    	$validMessages = [
            'occupation.required' => 'Occupation field is required.'
            ];
        $validator = Validator::make($datas, 
            [
                'occupation' => 'required'
            ],
            $validMessages
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator->messages());
        }

        $validationError = $validator->messages();
        $storeOccupation = Occupation::find($id);
        $storeOccupation->user_id = Auth::user()->user_id;
        $storeOccupation->occupation = $request->occupation;
        $storeOccupation->is_active = $request->isActive;
        $storeOccupation->last_action = ActionMessage::UPDATE;
        $storeOccupation->save();

        return \Redirect()->Route('new_occupation_view');
    }
}
