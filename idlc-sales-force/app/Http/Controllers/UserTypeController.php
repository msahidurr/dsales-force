<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Message\ActionMessage;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Model\UserType;
use Validator;
use Auth;
use DB;

class UserTypeController extends Controller
{
    
    public function index(){
        $UserTypeDetails = DB::table('tbl_user_type')
                            ->orderBy('id_user_type','DESC')
                            ->where('is_deleted',0)
                            ->paginate(15);

        return view('managment.user_type.index',compact('UserTypeDetails'));
    }

    public function create(){
        return view('managment.user_type.create');
    }

    
    public function store(Request $request){

        $validMessages = [
            'user_type.required' => 'User Type Name field is required.',
            'user_type.unique' => 'User Type Name all ready exit.'
            ];
        $datas = $request->all();
        $validator = Validator::make($datas, 
            [
                'user_type' => [
                                'required',
                                Rule::unique('tbl_user_type')->ignore(1, 'is_deleted')
                                ]
            ],
            $validMessages
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator->messages());
        }

        $validationError = $validator->messages();
        $storeUserType = new UserType();
        $storeUserType->user_type = $request->user_type;
        $storeUserType->is_active = $request->isActive;
        // $storeUserType->user_id = Auth::user()->user_id;
        $storeUserType->last_action = ActionMessage::CREATE;
        $storeUserType->save();
        
         return \Redirect()->Route('userTypes.index');
    }

    
    public function show($id)
    {
          echo "show";
    }

    
    public function edit($id)
    {   
        $findUserType = UserType::where('id_user_type',$id)->get();
        return view('managment.user_type.edit',compact('findUserType'));
    }

    
    public function update(Request $request, $id)
    {   
        $validMessages = [
            'user_type.required' => 'User Type field is required.',
            'user_type.unique' => 'User Type all ready exit.'
            ];
        $datas = $request->all();
        $validator = Validator::make($datas, 
            [
                'user_type' => [
                                'required',
                                Rule::unique('tbl_user_type')->ignore(1, 'is_deleted')
                                ]
            ],
            $validMessages
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator->messages());
        }

        $updateUserType = UserType::find($id);
        $updateUserType->user_type = $request->user_type;
        $updateUserType->is_active = $request->isActive;
        // $updateUserType->user_id = Auth::user()->user_id;
        $updateUserType->last_action = ActionMessage::UPDATE;
        $updateUserType->update();
        
        return \Redirect()->Route('userTypes.index');
    }

    
    public function destroy($id)
    {
        $deleteUserType = UserType::find($id);
        $deleteUserType->is_deleted = ActionMessage::IS_DELETED;
        $deleteUserType->last_action = ActionMessage::DELETE;
        $deleteUserType->update();
        return \Redirect()->Route('userTypes.index');
    }
}
