<?php

namespace App\Http\Controllers\ManagementSetting;

use App\Http\Controllers\Message\ActionMessage;
use App\Model\ManagementSetting\ExamName;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class ExamNameController extends Controller
{
	public function index(){
        $getListValue = DB::table('tbl_exam_names')
                            ->orderBy('id_exam_name','DESC')
                            ->paginate(15);
    	return view('management_setting.exam_name.examNameList',compact('getListValue'));
    }

    public function addExamName(){
    	return view('management_setting.exam_name.addExamName');
    }
    public function editExamName($id){
    	$editValue = DB::table('tbl_exam_names')->where('id_exam_name',$id)->get();
    	return view('management_setting.exam_name.editExamName',compact('editValue'));
    }

    public function storeExamName(Request $request){
        
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
        $storeTrainingName = new ExamName();
        $storeTrainingName->user_id = Auth::user()->user_id;
        $storeTrainingName->name = $request->name;
        $storeTrainingName->description = $request->description;
        $storeTrainingName->is_active = $request->isActive;
        $storeTrainingName->last_action = ActionMessage::CREATE;
        $storeTrainingName->save();

        return \Redirect()->Route('exam_name_list');
    }

    public function updateExamName(Request $request,$id){
        
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
        $storeTrainingName = ExamName::find($id);
        $storeTrainingName->user_id = Auth::user()->user_id;
        $storeTrainingName->name = $request->name;
        $storeTrainingName->description = $request->description;
        $storeTrainingName->is_active = $request->isActive;
        $storeTrainingName->last_action = ActionMessage::UPDATE;
        $storeTrainingName->save();

        return \Redirect()->Route('exam_name_list');
    }
}
