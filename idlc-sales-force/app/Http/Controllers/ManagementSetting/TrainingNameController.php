<?php

namespace App\Http\Controllers\ManagementSetting;

use App\Http\Controllers\Message\ActionMessage;
use App\Model\ManagementSetting\TrainingName;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class TrainingNameController extends Controller
{
    public function viewTrainingName(){
        $getListValue = DB::table('tbl_training_name')
                            ->orderBy('id_training_name','DESC')
                            ->paginate(15);
    	return view('management_setting.training_name.trainingNameList',compact('getListValue'));
    }

    public function addTraining(){
    	return view('management_setting.training_name.addTrainingName');
    }
    public function editTraining($id){
    	$editValue = DB::table('tbl_training_name')->where('id_training_name',$id)->get();
    	return view('management_setting.training_name.editTrainingName',compact('editValue'));
    }

    public function storeTraining(Request $request){
        
        $datas = $request->all();
    	$validMessages = [
            'name.required' => 'Training Name field is required.',
            'description.required' => 'Description field is required.',
            ];
        $validator = Validator::make($datas, 
            [
                'name' => 'required',
                'description' => 'required',
            ],
            $validMessages
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator->messages());
        }

        $validationError = $validator->messages();
        $storeTrainingName = new TrainingName();
        $storeTrainingName->user_id = Auth::user()->user_id;
        $storeTrainingName->name = $request->name;
        $storeTrainingName->description = $request->description;
        $storeTrainingName->is_active = $request->isActive;
        $storeTrainingName->last_action = ActionMessage::CREATE;
        $storeTrainingName->save();

        return \Redirect()->Route('new_training_name_view');
    }

    public function updateTraining(Request $request,$id){
        
        $datas = $request->all();
    	$validMessages = [
            'name.required' => 'Training Name field is required.',
            'description.required' => 'Description field is required.',
            ];
        $validator = Validator::make($datas, 
            [
                'name' => 'required',
                'description' => 'required',
            ],
            $validMessages
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator->messages());
        }

        $validationError = $validator->messages();
        $storeTrainingName = TrainingName::find($id);
        $storeTrainingName->user_id = Auth::user()->user_id;
        $storeTrainingName->name = $request->name;
        $storeTrainingName->description = $request->description;
        $storeTrainingName->is_active = $request->isActive;
        $storeTrainingName->last_action = ActionMessage::UPDATE;
        $storeTrainingName->save();

        return \Redirect()->Route('new_training_name_view');
    }
}
