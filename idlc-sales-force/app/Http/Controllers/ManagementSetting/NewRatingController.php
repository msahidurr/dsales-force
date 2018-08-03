<?php

namespace App\Http\Controllers\ManagementSetting;

use App\Http\Controllers\Message\ActionMessage;
use App\Model\ManagementSetting\NewRating;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class NewRatingController extends Controller
{
    public function viewNewRating(){
        $getListValue = DB::table('tbl_new_rating')
                            ->orderBy('id_rating','DESC')
                            ->paginate(15);
    	return view('management_setting.new_rating.newRatingList',compact('getListValue'));
    }

    public function addRating(){
    	return view('management_setting.new_rating.addNewRating');
    }
    public function editRating($id){
    	$editValue = DB::table('tbl_new_rating')->where('id_rating',$id)->get();
    	return view('management_setting.new_rating.editNewRating',compact('editValue'));
    }

    public function storeRating(Request $request){
        
        $datas = $request->all();
    	$validMessages = [
            'lead_completed_number.required' => 'Completed lead field is required.',
            // 'rating.required' => 'Rating field is required.',
            ];
        $validator = Validator::make($datas, 
            [
                'lead_completed_number' => 'required',
                // 'rating' => 'required',
            ],
            $validMessages
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator->messages());
        }

        $validationError = $validator->messages();
        $storeNewRating = new NewRating();
        $storeNewRating->user_id = Auth::user()->user_id;
        // $storeNewRating->rating = $request->rating;
        $storeNewRating->lead_completed_number = $request->lead_completed_number;
        $storeNewRating->is_active = $request->isActive;
        $storeNewRating->last_action = ActionMessage::CREATE;
        $storeNewRating->save();

        return \Redirect()->Route('new_rating_view');
    }

    public function updateRating(Request $request,$id){
        
        $datas = $request->all();
    	$validMessages = [
            'lead_completed_number.required' => 'Completed lead field is required.',
            // 'rating.required' => 'Rating field is required.',
            ];
        $validator = Validator::make($datas, 
            [
                'lead_completed_number' => 'required',
                // 'rating' => 'required',
            ],
            $validMessages
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator->messages());
        }

        $validationError = $validator->messages();
        $storeNewRating = NewRating::find($id);
        $storeNewRating->user_id = Auth::user()->user_id;
        // $storeNewRating->rating = $request->rating;
        $storeNewRating->lead_completed_number = $request->lead_completed_number;
        $storeNewRating->is_active = $request->isActive;
        $storeNewRating->last_action = ActionMessage::UPDATE;
        $storeNewRating->save();

        return \Redirect()->Route('new_rating_view');
    }
}
