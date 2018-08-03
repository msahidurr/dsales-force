<?php

namespace App\Http\Controllers\salesAgent;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use Excel;
use Hash;
use Session;
use File;
use Redirect;
use App\IFARegistration;
use DateTime;

class BulkUploadController extends Controller
{
    public function bulkUploadView(){
    	$institutions = $ocupations_ = DB::table('tbl_new_organization')->where('is_active', 1)->get();
    	return view('sales_agent.bulk_upload.viewBulkUpload',['institutions' => $institutions]);
    }
    public function bulkUploadAction(Request $request){

	    $this->validate($request, array(
	        'bulk'      => 'required'
	    ));

	    if($request->hasFile('bulk')){
	        $extension = File::extension($request->file('bulk')->getClientOriginalName());
	        if ($extension == "xlsx" || $extension == "xls") {

	        	$getNationality = $this->getNationality();
	        	$getPremiseOwnership = $this->getPremiseOwnership();
	        	$getDivisions = $this->getDivisions();
	        	$getDistrict = $this->getDistrict();
	        	$getUserType = $this->getUserType();
	        	$getBanks = $this->getBanks();
	        	$getBankBranchs = $this->getBankBranchs();
	        	$getAllBranchs = $this->getAllBranchs();
	            $path = $request->file('bulk')->getRealPath();
	            $data = Excel::load($path, function($reader) {
	            })->get();
	            $insert = [];
	            $err_insert = [];
	            if(!empty($data) && $data->count()){
	                	$i = 0;
	                foreach ($data as $ykey => $yvalue) {
	                	$temp_insert[] = self::generateArray($yvalue);
	                }
	            }
	            $filters_array = self::unique_multidim_array($temp_insert,'mobile_number');
	            $filters_array = self::unique_multidim_array($filters_array,'email_id');
	            $filters_array = self::unique_multidim_array($filters_array,'nid');
	            if(count($filters_array) == count($temp_insert)){
		            if(!empty($data) && $data->count()){
		                	$i = 0;
		                foreach ($data as $xkey => $xvalue) {

		                	if(isset($xvalue->mobile_number) && !empty($xvalue->mobile_number)){
	                		if(!$this->mobileNoValidate(self::formatMobileNumber($xvalue->mobile_number))){
		                			$err_insert[] = self::generateArray($xvalue,"Already exist or Mobile number is Invalid.");
		                			continue;
		                		}
		                	}else{
		                		$err_insert[] = self::generateArray($xvalue,"Already exist or Mobile number is Invalid.");
		                		continue;
		                	}
		                	if(isset($xvalue->email_id) && !empty($xvalue->email_id)){
		                		if(!$this->emailValidate($xvalue->email_id)){
		                			$err_insert[] = self::generateArray($xvalue,"Already exist or Email is Invalid.");
		                			continue;
		                		}
		                	}else{
		                		$err_insert[] = self::generateArray($xvalue,"Already exist or Email is Invalid.");
		                		continue;
		                	}
		                	if(isset($xvalue->nid) && !empty($xvalue->nid)){
		                		if(!$this->nidValidate($xvalue->nid)){
		                			$err_insert[] = self::generateArray($xvalue,"Already exist or NID is Invalid.");
		                			continue;
		                		}
		                	}else{
		                		$err_insert[] = self::generateArray($xvalue,"Already exist or NID is Invalid.");
		                		continue;
		                	}
		                	if(isset($xvalue->dob) && !empty($xvalue->dob)){
		                		if(!self::CheckAdultAge($xvalue->dob->format('m/d/Y'))){
		                			$err_insert[] = self::generateArray($xvalue,"DOB Is not Valid or Must Be 18+ years Old.");
		                			continue;
		                		}
		                	}else{
		                		$err_insert[] = self::generateArray($xvalue,"DOB Is not Valid or Must Be 18+ years Old.");
		                		continue;
		                	}
		                	$insert[$i]['application_status'] = "InProgress";
		                	$insert[$i]['button_presses'] = "";
		                	$insert[$i]['user_name'] = "";
		                	$insert[$i]['student_department'] = "";
		                	$insert[$i]['training_status'] = "";
		                	$insert[$i]['is_active'] = 1;
		                	$insert[$i]['is_delete'] = 0;
		                	$insert[$i]['pre_addr_premise_ownership'] = 4;
		                	$insert[$i]['per_addr_premise_ownership'] = 4;
		                	$password = rand(pow(10, 5 - 1), pow(10, 5) - 1);
		                	$insert[$i]['password'] = Hash::make($password);
	                	    if(isset($xvalue->name)){
	                	    	$name_var = $xvalue->name;
	                	    	$name_ = explode(" ", strtolower($name_var));
	                	    	if((in_array('md', $name_)) || (in_array('mst', $name_)) || (in_array('md.', $name_)) || (in_array('mst.', $name_))){
	                	    		if(count($name_) == 3){
	                	    			$insert[$i]['first_name'] = $name_[0].' '.$name_[1];
	                	    			$insert[$i]['last_name'] = $name_[2];
	                	    		}elseif (count($name_) == 2) {
	                	    			$insert[$i]['first_name'] = $name_[0].' '.$name_[1];
	                	    			$insert[$i]['last_name'] = $name_[1];
	                	    		}elseif (count($name_) == 1) {
	                	    			$insert[$i]['first_name'] = $name_[0];
	                	    			$insert[$i]['last_name'] = $name_[0];
	                	    		}elseif (count($name_) > 3) {
	                	    			$insert[$i]['first_name'] = $name_[0].' '.$name_[1];
	                	    			$insert[$i]['middle_name'] = $name_[2];
	                	    			$FulllastName = '';
	                	    			for($fi = 3;$fi < count($name_);$fi++){
	                	    				if(isset($name_[$fi])){
	                	    					$FulllastName .= $name_[$fi].' ';
	                	    				}
	                	    			}
	                	    			$insert[$i]['last_name'] = $FulllastName;
	                	    		}
	                	    	}else{
	                	    		if(count($name_) == 3){
	                	    			$insert[$i]['first_name'] = $name_[0];
	                	    			$insert[$i]['middle_name'] = $name_[1];
	                	    			$insert[$i]['last_name'] = $name_[2];
	                	    		}elseif (count($name_) == 2) {
	                	    			$insert[$i]['first_name'] = $name_[0];
	                	    			$insert[$i]['last_name'] = $name_[1];
	                	    		}elseif (count($name_) == 1) {
	                	    			$insert[$i]['first_name'] = $name_[0];
	                	    			$insert[$i]['last_name'] = $name_[0];
	                	    		}elseif (count($name_) > 3) {
	                	    			$insert[$i]['first_name'] = $name_[0];
	                	    			$insert[$i]['middle_name'] = $name_[1];
	                	    			$FulllastName = '';
	                	    			for($fi = 2;$fi < count($name_);$fi++){
	                	    				if(isset($name_[$fi])){
	                	    					$FulllastName .= $name_[$fi].' ';
	                	    				}
	                	    			}
	                	    			$insert[$i]['last_name'] = $FulllastName;
	                	    		}
	                	    	}
	                	    }
	                	    if(empty($insert[$i]['first_name'])){
	                	    	$insert[$i]['first_name'] = '';
	                	    }
	                	    if(empty($insert[$i]['last_name'])){
	                	    	$insert[$i]['last_name'] = '';
	                	    }
	                	    if(empty($insert[$i]['middle_name'])){
	                	    	$insert[$i]['middle_name'] = '';
	                	    }
	                	    if(isset($xvalue->mobile_number)){
	                	    	$insert[$i]['mobile_no'] = self::formatMobileNumber($xvalue->mobile_number);
	                	    }else{
	                	    	$insert[$i]['mobile_no'] = '';
	                	    }
	                	    if(isset($xvalue->email_id)){
	                	    	$insert[$i]['email'] = $xvalue->email_id;
	                	    }else{
	                	    	$insert[$i]['email'] = '';
	                	    }
	                	    if(isset($xvalue->father)){
	                	    	$insert[$i]['father_name'] = $xvalue->father;
	                	    }else{
	                	    	$insert[$i]['father_name'] = '';
	                	    }
	                	    if(isset($xvalue->mother)){
	                	    	$insert[$i]['mother_name'] = $xvalue->mother;
	                	    }else{
	                	    	$insert[$i]['mother_name'] = '';
	                	    }
	                	    if(isset($xvalue->nationality)){
	                	    	$nationality = strtolower($xvalue->nationality);
	                	    	if(isset($getNationality[$nationality])){
	                	    		$insert[$i]['nationality'] = $getNationality[$nationality];
	                	    	}else{
	                	    		$insert[$i]['nationality'] = -1;
	                	    		$insert[$i]['others_nationality'] = $xvalue->nationality;
	                	    	}
	                	    }else{
	                	    	$insert[$i]['nationality'] = -1;
	                	    	$insert[$i]['others_nationality'] = '';

	                	    }
	                	    if(isset($xvalue->dob) && !empty($xvalue->dob)){
	                	    	$insert[$i]['date_of_birth'] = $xvalue->dob->format('m/d/Y');
	                	    }else{
	                	    	$insert[$i]['date_of_birth'] = date("m/d/Y");;
	                	    }
	                	    if(isset($xvalue->nid)){
	                	    	$insert[$i]['national_id_card_no'] = $xvalue->nid;
	                	    }else{
	                	    	$insert[$i]['national_id_card_no'] = '';
	                	    }
	                	    if(isset($xvalue->user_type) && !empty($xvalue->user_type)){
	                	    	$user_type = strtolower($xvalue->user_type);
	                	    	if(isset($getUserType[$user_type])){
	                	    		$insert[$i]['user_type_id'] = $getUserType[$user_type];
	                	    	}else{
	                	    		$insert[$i]['user_type_id'] = -1;
	                	    		$insert[$i]['others_user_type'] = $user_type;
	                	    	}
	                	    }else{
	                	    	$insert[$i]['user_type_id'] = -1;
	                	    	$insert[$i]['others_user_type'] = 'N/A';
	                	    }

	                	    if(isset($xvalue->permanent_address) && !empty($xvalue->permanent_address)){
	                	    	$insert[$i]['is_same_as_present_address'] = 0;
	                	    }else{
	                	    	$insert[$i]['is_same_as_present_address'] = 1;
	                	    }
	                	    if(isset($xvalue->present_address)){
	                	    	$present_address = $xvalue->present_address;
	                	    	$present_address_temp = strtolower($present_address);
	                	    	if(isset($present_address_temp) && !empty($present_address_temp)){
	                	    		$preAddress = explode(",", $present_address_temp);
	                	    		foreach ($preAddress as $pre => $address) {
	                	    			if (strpos($address, "div:") !== false) {
	                	    			    $div = str_replace("div:","",$address);
	                	    			    if(isset($getDivisions[$div])){
	                	    			    	$insert[$i]['pre_addr_division_id'] = $getDivisions[$div];
	                	    			    }
	                	    			}elseif (strpos($address, "dist:") !== false) {
	                	    				$dist = str_replace("dist:","",$address);
	                	    				if(isset($getDistrict[$dist])){
	                	    					$insert[$i]['pre_addr_district_id'] = $getDistrict[$dist];
	                	    				}
	                	    			}elseif (strpos($address, "thana:") !== false) {
	                	    				$thana = str_replace("thana:","",$address);
	                	    				$insert[$i]['pre_addr_ps_id'] = $thana;
	                	    			}elseif (strpos($address, "road:") !== false) {
	                	    				$road = str_replace("road:","",$address);
	                	    				$insert[$i]['pre_addr_road_no'] = $road;
	                	    			}elseif (strpos($address, "house:") !== false) {
	                	    				$house = str_replace("house:","",$address);
	                	    				$insert[$i]['pre_addr_house_no'] = $house;
	                	    			}elseif (strpos($address, "flat:") !== false) {
	                	    				$flat = str_replace("flat:","",$address);
	                	    				$insert[$i]['pre_addr_flat_no'] = $flat;
	                	    			}
	                	    		}
	                	    	}
	                	    }
	                	    if(!isset($insert[$i]['pre_addr_division_id']) || empty($insert[$i]['pre_addr_division_id'])){
	                	    	$insert[$i]['pre_addr_division_id'] = '';
	                	    }
	                	    if(!isset($insert[$i]['pre_addr_district_id']) || empty($insert[$i]['pre_addr_district_id'])){
	                	    	$insert[$i]['pre_addr_district_id'] = '';
	                	    }
	                	    if(!isset($insert[$i]['pre_addr_ps_id']) || empty($insert[$i]['pre_addr_ps_id'])){
	                	    	$insert[$i]['pre_addr_ps_id'] = '';
	                	    }
	                	    if(!isset($insert[$i]['pre_addr_house_no']) || empty($insert[$i]['pre_addr_house_no'])){
	                	    	$insert[$i]['pre_addr_house_no'] = '';
	                	    }
	                	    if(!isset($insert[$i]['pre_addr_road_no']) || empty($insert[$i]['pre_addr_road_no'])){
	                	    	$insert[$i]['pre_addr_road_no'] = '';
	                	    }
	                	    if(!isset($insert[$i]['pre_addr_flat_no']) || empty($insert[$i]['pre_addr_flat_no'])){
	                	    	$insert[$i]['pre_addr_flat_no'] = '';
	                	    }
	                	    if(isset($xvalue->permanent_address)){
	                	    	$permanent_address = $xvalue->permanent_address;
	                	    	$permanent_address_temp = strtolower($permanent_address);
	                	    	if(isset($permanent_address_temp) && !empty($permanent_address_temp)){
	                	    		$parAddress = explode(",", $permanent_address_temp);
	                	    		foreach ($parAddress as $par => $praddress) {
	                	    			if (strpos($praddress, "div:") !== false) {
	                	    			    $div = str_replace("div:","",$praddress);
	                	    			    if(isset($getDivisions[$div])){
	                	    			    	$insert[$i]['per_addr_division_id'] = $getDivisions[$div];
	                	    			    }
	                	    			}elseif (strpos($praddress, "dist:") !== false) {
	                	    				$dist = str_replace("dist:","",$praddress);
	                	    				if(isset($getDistrict[$dist])){
	                	    					$insert[$i]['per_addr_district_id'] = $getDistrict[$dist];
	                	    				}
	                	    			}elseif (strpos($praddress, "thana:") !== false) {
	                	    				$thana = str_replace("thana:","",$praddress);
	                	    				$insert[$i]['per_addr_ps_id'] = $thana;
	                	    			}elseif (strpos($praddress, "road:") !== false) {
	                	    				$road = str_replace("road:","",$praddress);
	                	    				$insert[$i]['per_addr_road_no'] = $road;
	                	    			}elseif (strpos($praddress, "house:") !== false) {
	                	    				$house = str_replace("house:","",$praddress);
	                	    				$insert[$i]['per_addr_house_no'] = $house;
	                	    			}elseif (strpos($praddress, "flat:") !== false) {
	                	    				$flat = str_replace("flat:","",$praddress);
	                	    				$insert[$i]['per_addr_flat_no'] = $flat;
	                	    			}
	                	    		}
	                	    	}
	                	    }
	                	    if(!isset($insert[$i]['per_addr_division_id']) || empty($insert[$i]['per_addr_division_id'])){
	                	    	$insert[$i]['per_addr_division_id'] = '';
	                	    }
	                	    if(!isset($insert[$i]['per_addr_district_id']) || empty($insert[$i]['per_addr_district_id'])){
	                	    	$insert[$i]['per_addr_district_id'] = '';
	                	    }
	                	    if(!isset($insert[$i]['per_addr_ps_id']) || empty($insert[$i]['per_addr_ps_id'])){
	                	    	$insert[$i]['per_addr_ps_id'] = '';
	                	    }
	                	    if(!isset($insert[$i]['per_addr_road_no']) || empty($insert[$i]['per_addr_road_no'])){
	                	    	$insert[$i]['per_addr_road_no'] = '';
	                	    }
	                	    if(!isset($insert[$i]['per_addr_house_no']) || empty($insert[$i]['per_addr_house_no'])){
	                	    	$insert[$i]['per_addr_house_no'] = '';
	                	    }
	                	    if(!isset($insert[$i]['per_addr_flat_no']) || empty($insert[$i]['per_addr_flat_no'])){
	                	    	$insert[$i]['per_addr_flat_no'] = '';
	                	    }
	                	    if(isset($xvalue->latest_degree)){
	                	    	$insert[$i]['latest_degree'] = $xvalue->latest_degree;
	                	    }else{
	                	    	$insert[$i]['latest_degree'] = '';
	                	    }
	                	    if(isset($xvalue->last_educational_institution)){
	                	    	$insert[$i]['last_educational_institution'] = $xvalue->last_educational_institution;
	                	    }else{
	                	    	$insert[$i]['last_educational_institution'] = '';
	                	    }
	                	    if(isset($xvalue->job_holder)){
	                	    	if($xvalue->job_holder == 'yes' || $xvalue->job_holder == 1){
	                	    		$insert[$i]['is_job_holder'] = 1;	
	                	    	}else{
	                	    		$insert[$i]['is_job_holder'] = 0;	
	                	    	}
	                	    }else{
	                	    	$insert[$i]['is_job_holder'] = 0;
	                	    }
	                	    if(isset($xvalue->organization)){
	                	    	$insert[$i]['organization_name'] = $xvalue->organization;
	                	    }else{
	                	    	$insert[$i]['organization_name'] = '';
	                	    }
	                	    if(isset($xvalue->name)){
	                	    	$insert[$i]['employee_id_no'] = $xvalue->employee_id_no;
	                	    }else{
	                	    	$insert[$i]['employee_id_no'] = '';
	                	    }
	                	    if(isset($xvalue->designation)){
	                	    	$insert[$i]['designation'] = $xvalue->designation;
	                	    }else{
	                	    	$insert[$i]['designation'] = '';
	                	    }
	                	    if(isset($xvalue->name)){
	                	    	$insert[$i]['job_holder_department'] = $xvalue->department;
	                	    }else{
	                	    	$insert[$i]['job_holder_department'] = '';
	                	    }
	                	    if(isset($xvalue->student)){
	                	    	if($xvalue->student == 'yes' || $xvalue->student == 1){
	                	    		$insert[$i]['is_student'] = 1;
	                	    	}else{
	                	    		$insert[$i]['is_student'] = 0;
	                	    	}
	                	    }else{
	                	    	$insert[$i]['is_student'] = 0;
	                	    }
	                	    if(isset($xvalue->institution)){
	                	    	$insert[$i]['institution_name'] = $xvalue->institution;
	                	    }else{
	                	    	$insert[$i]['institution_name'] = '';
	                	    }
	                	    if(isset($xvalue->student_id_card_no)){
	                	    	$insert[$i]['student_id_card_no'] = $xvalue->student_id_card_no;
	                	    }else{
	                	    	$insert[$i]['student_id_card_no'] = '';
	                	    }
	                	    if(isset($xvalue->bank_name) && !empty($xvalue->bank_name)){
	                	    	$insert[$i]['receive_sales_commission_by'] = 'Bank';
	                	    }elseif (isset($xvalue->bkash_no) && !empty($xvalue->bkash_no)) {
	                	    	$insert[$i]['receive_sales_commission_by'] = 'bKash';
	                	    }else{
	                	    	$insert[$i]['receive_sales_commission_by'] = '';
	                	    }
	                	    if(isset($xvalue->bank_name)){
	                	    	$bank_name = strtolower($xvalue->bank_name);
	                	    	if(isset($getBanks[$bank_name]) && !empty($getBanks[$bank_name])){
	                	    		$insert[$i]['bank_id'] = $getBanks[$bank_name];
	                	    	}else{
	                	    		$insert[$i]['bank_id'] = '';
	                	    	}
	                	    }else{
	                	    	$insert[$i]['bank_id'] = '';
	                	    }
	                	    if(isset($xvalue->branch_name)){
	                	    	if(isset($insert[$i]['bank_name']) && !empty($insert[$i]['bank_name'])){
	                	    		$bank_id = $insert[$i]['bank_name'];
	                	    		$branch_name = strtolower($xvalue->branch_name);
	                	    		if(isset($getBankBranchs[$bank_id][$branch_name]) && !empty($getBankBranchs[$bank_id][$branch_name])){
	                	    			$insert[$i]['bank_branch_id'] = $getBankBranchs[$bank_id][$branch_name];
	                	    		}else{
	                	    			$insert[$i]['bank_branch_id'] = '';
	                	    		}
	                	    	}else{
	                	    		$branch_name = strtolower($xvalue->branch_name);
	                	    		if(isset($getAllBranchs[$branch_name]) && !empty($getAllBranchs[$branch_name])){
	                	    			$insert[$i]['bank_branch_id'] = $getAllBranchs[$branch_name];
	                	    		}else{
	                	    			$insert[$i]['bank_branch_id'] = '';
	                	    		}
	                	    	}
	                	    }else{
	                	    	$insert[$i]['bank_branch_id'] = '';
	                	    }
	                	    if(isset($xvalue->ac_no)){
	                	    	$insert[$i]['bank_account_no'] = $xvalue->ac_no;
	                	    }else{
	                	    	$insert[$i]['bank_account_no'] = '';
	                	    }
	                	    if(isset($xvalue->bkash_no)){
	                	    	$insert[$i]['bKash_mobile_no'] = self::formatMobileNumber($xvalue->bkash_no);
	                	    }else{
	                	    	$insert[$i]['bKash_mobile_no'] = '';
	                	    }
	                	    if(isset($xvalue->bkash_account_type)){
	                	    	$insert[$i]['bKash_acc_type'] = strtolower($xvalue->bkash_account_type);
	                	    }else{
	                	    	$insert[$i]['bKash_acc_type'] = '';
	                	    }
	                	    $i = $i+1;
		                }
		                // self::print_me($err_insert);
		                // die();
		                if(isset($insert) && !empty($insert)){
		                	if(DB::table('tbl_ifa_registrations')->insert($insert)){
		                		if(isset($err_insert) && !empty($err_insert)){
		                			Session::flash('bulkerror', 'Successfully Inserted Partial data');
		                			Session::flash('err_ifa_list', $err_insert);
		                			return Redirect::back()->with(['err_ifa_list', $err_insert]);
		                		}else{
		                			Session::flash('bulksuccess', 'Successfully Inserted All Data');
		                			return Redirect::back();
		                		}
		                	}else{
		                		Session::flash('bulkerror', 'Somethings Wrong !!');
		                		if(isset($err_insert) && !empty($err_insert)){
		                			Session::flash('err_ifa_list', $err_insert);
		                			return Redirect::back()->with(['err_ifa_list', $err_insert]);
		                		}else{
		                			return Redirect::back()->with(['bulkerror', "Something Wrong!!"]);
		                		}
		                	}
		                }elseif (isset($err_insert) && !empty($err_insert)) {
		                	Session::flash('bulkerror', 'Somethings Wrong !!');
                			Session::flash('err_ifa_list', $err_insert);
                			return Redirect::back()->with(['err_ifa_list', $err_insert]);
		                }
		            }
	            }else{
	            	Session::flash('bulkerror', 'There It Has Some Of Duplicate Mobile or Email or NID..!!');
	            }
	            return back();
	        }else {
	            Session::flash('bulkerror', 'File is a '.$extension.' file.!! Please upload a valid xls file..!!');
	            return back();
	        }
	    }
    }
   public function leadBulkUploadAction(Request $request){
        $this->validate($request, array(
            'bulk'      => 'required'
        ));

        if($request->hasFile('bulk')){
            $extension = File::extension($request->file('bulk')->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls") {
            	$getOcupations = $this->getOcupations();
                $path = $request->file('bulk')->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();

                $insert = [];
                $err_insert = [];
                if(!empty($data) && $data->count()){
                    	$i = 0;
                    foreach ($data as $ykey => $yvalue) {

                    	if($yvalue->contact_no != null && $yvalue->contact_no != null){
                    		$temp_insert[] = self::generateArray($yvalue);	
                    	}
                    	
                    }
                }
                $filters_array = self::unique_multidim_array($temp_insert,'contact_no');
                $filters_array = self::unique_multidim_array($filters_array,'email');

                // $this->print_me(count($filters_array)." ".count($temp_insert));
                if(count($filters_array) == count($temp_insert)){
    	            if(!empty($data) && $data->count()){
    	                	$i = 0;
    	                foreach ($data as $xkey => $xvalue) {
    	                	if($xvalue->contact_no != null && $xvalue->contact_no != null){
	    	                	if(isset($xvalue->personal_name)){
	    	                		$insert[$i]['personal_name'] = $xvalue->personal_name;
	    	                	}else{
	    	                		$insert[$i]['personal_name'] = '';
	    	                	}
	    	                	if(isset($xvalue->contact_no)){
	    	                		$insert[$i]['contact_no'] = $xvalue->contact_no;
	    	                	}else{
	    	                		$insert[$i]['contact_no'] = '';
	    	                	}
	    	                	if(isset($xvalue->email)){
	    	                		$insert[$i]['email'] = $xvalue->email;
	    	                	}else{
	    	                		$insert[$i]['email'] = '';
	    	                	}
	    	                	if(isset($xvalue->area)){
	    	                		$insert[$i]['area'] = $xvalue->area;
	    	                	}else{
	    	                		$insert[$i]['area'] = '';
	    	                	}	                	
	    	                	if(isset($xvalue->occupation_id)){
	    	                		if(isset($getOcupations[strtolower($xvalue->occupation_id)])){
	    	                			$insert[$i]['occupation_id'] = $getOcupations[strtolower($xvalue->occupation_id)];
	    	                		}else{
	    	                			$insert[$i]['occupation_id'] = '';
	    	                		}
	    	                	}else{
	    	                		$insert[$i]['occupation_id'] = '';
	    	                	}
	    	                	if(isset($xvalue->user_id)){
	    	                		$insert[$i]['user_id'] = $xvalue->user_id;
	    	                	}else{
	    	                		$insert[$i]['user_id'] = 0;
	    	                	}
	    	                	if(isset($xvalue->lead_number)){
	    	                		$insert[$i]['lead_number'] = $xvalue->lead_number;
	    	                	}else{
	    	                		$insert[$i]['lead_number'] = '';
	    	                	}
	    	                	if(isset($xvalue->lead_type)){
	    	                		$insert[$i]['lead_type'] = $xvalue->lead_type;
	    	                	}else{
	    	                		$insert[$i]['lead_type'] = 'new';
	    	                	}
	    	                	if(isset($xvalue->reference_number)){
	    	                		$insert[$i]['reference_number'] = $xvalue->reference_number;
	    	                	}else{
	    	                		$insert[$i]['reference_number'] = '';
	    	                	}
	    	                	if(isset($xvalue->investment_name)){
	    	                		$insert[$i]['investment_name'] = $xvalue->investment_name;
	    	                	}else{
	    	                		$insert[$i]['investment_name'] = '';
	    	                	}
	    	                	if(isset($xvalue->investment_type)){
	    	                		$insert[$i]['investment_type'] = $xvalue->investment_type;
	    	                	}else{
	    	                		$insert[$i]['investment_type'] = '';
	    	                	}
	    	                	if(isset($xvalue->follow_up_date)){
	    	                		$insert[$i]['follow_up_date'] = $xvalue->follow_up_date;
	    	                	}else{
	    	                		$insert[$i]['follow_up_date'] = '';
	    	                	}
	    	                	if(isset($xvalue->contact_status)){
	    	                		$insert[$i]['contact_status'] = $xvalue->contact_status;
	    	                	}else{
	    	                		$insert[$i]['contact_status'] = '';
	    	                	}
	    	                	if(isset($xvalue->interest_label)){
	    	                		$insert[$i]['interest_label'] = $xvalue->interest_label;
	    	                	}else{
	    	                		$insert[$i]['interest_label'] = '';
	    	                	}
	    	                	if(isset($xvalue->investment_action_id)){
	    	                		$insert[$i]['investment_action_id'] = $xvalue->investment_action_id;
	    	                	}else{
	    	                		$insert[$i]['investment_action_id'] = '';
	    	                	}
	    	                	if(isset($xvalue->remark_or_comment)){
	    	                		$insert[$i]['remark_or_comment'] = $xvalue->remark_or_comment;
	    	                	}else{
	    	                		$insert[$i]['remark_or_comment'] = '';
	    	                	}
	    	                	if(isset($xvalue->last_action)){
	    	                		$insert[$i]['last_action'] = $xvalue->last_action;
	    	                	}else{
	    	                		$insert[$i]['last_action'] = '';
	    	                	}
	                    	    $i = $i+1;
                    		}
    	                }
    	                if(isset($insert) && !empty($insert)){
    	                	if(DB::table('tbl_create_lead')->insert($insert)){
    	                		if(isset($err_insert) && !empty($err_insert)){
    	                			Session::flash('bulkerror', 'Successfully Inserted Partial data');
    	                			Session::flash('err_ifa_list', $err_insert);
    	                			return Redirect::back()->with(['err_ifa_list', $err_insert]);
    	                		}else{
    	                			Session::flash('bulksuccess', 'Successfully Inserted All Data');
    	                			return Redirect::back();
    	                		}
    	                	}else{
    	                		Session::flash('bulkerror', 'Somethings Wrong !!');
    	                		if(isset($err_insert) && !empty($err_insert)){
    	                			Session::flash('err_ifa_list', $err_insert);
    	                			return Redirect::back()->with(['err_ifa_list', $err_insert]);
    	                		}else{
    	                			return Redirect::back()->with(['bulkerror', "Something Wrong!!"]);
    	                		}
    	                	}
    	                }elseif (isset($err_insert) && !empty($err_insert)) {
    	                	Session::flash('bulkerror', 'Somethings Wrong !!');
                			Session::flash('err_ifa_list', $err_insert);
                			return Redirect::back()->with(['err_ifa_list', $err_insert]);
    	                }
    	            }
                }else{
                	Session::flash('bulkerror', 'There It Has Some Of Duplicate Contact Number or Email..!!');
                	return back();
                }
                return back();
            }else {
                Session::flash('bulkerror', 'File is a '.$extension.' file.!! Please upload a valid xls file..!!');
                return back();
            }
        }
    }

    public function storeBulk(){
    	return view('sales_agent.bulk_upload.viewBulkUpload');
    }
    public function getNationality(){
    	$nationality_ = DB::table('tbl_nationalitys')->orderBy('id_nationality', 'DESC')->where('is_deleted', 0)->get();
    	$nationality = array();
    	if(isset($nationality_) && !empty($nationality_)){
    		foreach ($nationality_ as $nation) {
    			if(isset($nation->nationality) && !empty($nation->nationality) && isset($nation->id_nationality) && !empty($nation->id_nationality)){
    				$nationality[strtolower($nation->nationality)] = $nation->id_nationality;
    			}
    		}
    	}
    	return $nationality;
    }

    public function getPremiseOwnership(){
    	$premise_ownership_ = DB::table('tbl_premise_ownership')->orderBy('id_premise_ownership', 'DESC')->where('is_deleted', 0)->get();
    	$premise_ownership = array();
    	if(isset($premise_ownership_) && !empty($premise_ownership_)){
    		foreach ($premise_ownership_ as $ownership) {
    			if(isset($ownership->premise_ownership) && !empty($ownership->premise_ownership) && isset($ownership->id_premise_ownership) && !empty($ownership->id_premise_ownership)){
    				$premise_ownership[strtolower($ownership->premise_ownership)] = $ownership->id_premise_ownership;
    			}
    		}
    	}
    	return $premise_ownership;
    }

    public function getDivisions(){
    	$divisions_ = DB::table('tbl_bangladesh_divisions')
                ->orderBy('division_id', 'DESC')
                ->where('is_deleted', 0)->get();
    	$divisions = array();
    	if(isset($divisions_) && !empty($divisions_)){
    		foreach ($divisions_ as $division) {
    			if(isset($division->division_name) && !empty($division->division_name) && isset($division->division_id) && !empty($division->division_id)){
    				$divisions[strtolower($division->division_name)] = $division->division_id;
    			}
    		}
    	}
    	return $divisions;
    }
    public function getDistrict(){
    	$district_ = DB::table('tbl_bangladesh_districts')->where('is_deleted', 0)->get();
    	$districts = array();
    	if(isset($district_) && !empty($district_)){
    		foreach ($district_ as $district) {
    			if(isset($district->district_name) && !empty($district->district_name) && isset($district->district_id) && !empty($district->district_id)){
    				$districts[strtolower($district->district_name)] = $district->district_id;
    			}
    		}
    	}
    	return $districts;
    }
    public function getUserType(){
    	$userTypes_ = DB::table('tbl_user_type')->where('is_deleted', 0)->get();
    	$userTypes = array();
    	if(isset($userTypes_) && !empty($userTypes_)){
    		foreach ($userTypes_ as $userType) {
    			if(isset($userType->user_type) && !empty($userType->user_type) && isset($userType->id_user_type) && !empty($userType->id_user_type)){
    				$userTypes[strtolower($userType->user_type)] = $userType->id_user_type;
    			}
    		}
    	}
    	return $userTypes;
    }
    public function getBank(){
    	$banks_ = DB::table('tbl_bangladesh_bank')->where('is_deleted', 0)->get();
    	$banks = array();
    	if(isset($banks_) && !empty($banks_)){
    		foreach ($banks_ as $bank) {
    			if(isset($bank->bank_name) && !empty($bank->bank_name) && isset($bank->bank_id) && !empty($bank->bank_id)){
    				$banks[strtolower($bank->bank_name)] = $bank->bank_id;
    			}
    		}
    	}
    	return $banks;
    }
    public function getBanks(){
    	$banks_ = DB::table('tbl_bangladesh_bank')->where('is_deleted', 0)->get();
    	$banks = array();
    	if(isset($banks_) && !empty($banks_)){
    		foreach ($banks_ as $bank) {
    			if(isset($bank->bank_name) && !empty($bank->bank_name) && isset($bank->bank_id) && !empty($bank->bank_id)){
    				$banks[strtolower($bank->bank_name)] = $bank->bank_id;
    			}
    		}
    	}
    	return $banks;
    }
    public function getBankBranchs(){
    	$branchs = array();
		$branchs_ = DB::table('tbl_bangladesh_bank_branch')->where('is_deleted',0)->get();
		if(isset($branchs_) && !empty($branchs_)){
			foreach ($branchs_ as $branch) {
				if(isset($branch->branch_name) && !empty($branch->branch_name) && isset($branch->branch_id) && !empty($branch->branch_id)){
					$branchs[$branch->bank_id][strtolower($branch->branch_name)] = $branch->branch_id;
				}
			}
		}
    	return $branchs;
    }
    public function getAllBranchs(){
    	$branchs = array();
		$branchs_ = DB::table('tbl_bangladesh_bank_branch')->where('is_deleted',0)->get();
		if(isset($branchs_) && !empty($branchs_)){
			foreach ($branchs_ as $branch) {
				if(isset($branch->branch_name) && !empty($branch->branch_name) && isset($branch->branch_id) && !empty($branch->branch_id)){
					$branchs[strtolower($branch->branch_name)] = $branch->branch_id;
				}
			}
		}
    	return $branchs;
    }
    public function mobileNoValidate($mobile_number = null)
    {
    	if($mobile_number == null){
    		return false;
    	}
    	if (empty($mobile_number)) {
    		return false;
    	}
    	if (strlen($mobile_number) != 9) {
    		return false;
    	}
    	if (!is_numeric($mobile_number)) {
    		return false;
    	}
    	$mobileNoCheck = IFARegistration::get()->where('mobile_no', $mobile_number)->count();
    	if ($mobileNoCheck > 0) {
    		return false;
    	}else{
    		return true;
    	}
    }

    public static function formatMobileNumber($mobile_number = null)
    {
    	if($mobile_number == null){
    		return $mobile_number;
    	}
    	if (empty($mobile_number)) {
    		return $mobile_number;
    	}
    	$mob_len = strlen($mobile_number);
    	if ($mob_len == 9) {
    		return $mobile_number;
    	}else{
    		if ($mob_len == 11) {
    			return substr($mobile_number, 2,11);
    		}elseif ($mob_len == 10) {
    			return substr($mobile_number, 1,10);
    		}else{
    			return '';
    		}
    	}
    }

    public function emailValidate($email = null) {
    	if($email == null){
    		return false;
    	}
    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	  return false; 
    	}
    	$emailCheck = IFARegistration::get()->where('email', $email)->count();
    	if ($emailCheck > 0) {
    		return false;
    	}else{
    		return true;
    	}
    }
    public static function CheckAdultAge($date = null) {
    	$today = new DateTime(date("m/d/Y"));
    	$bday = new DateTime($date);
    	$interval = $today->diff($bday);
    	if(intval($interval->y) > 18){
    	    return true;
    	}else{
    	    return false;
    	}
    }
    public function nidValidate($national_id_card_no = null) {
    	if($national_id_card_no == null){
    		return false;
    	}
    	if (!is_numeric($national_id_card_no)) {
    		return false;
    	}
    	$nidlen = strlen($national_id_card_no);
    	$valid_nid_len = [10,13,17];
    	if(!in_array($nidlen,$valid_nid_len)){
    		return false;
    	}
    	$nidCheck = IFARegistration::get()->where('national_id_card_no', $national_id_card_no)->count();
    	if ($nidCheck > 0) {
    		return false;
    	}
    	return true;
    }
    public static function generateArray($values = null,$error = null){
    	$results = array();
    	if($values == null){
    		return $results;
    	}
    	if(isset($values) && !empty($values)){
    		foreach ($values as $key => $value) {
    			$results[$key] = $value;
    		}
    	}
    	if(isset($error) && !empty($error)){
    		$results['error'] = $error;
    	}
    	return $results;
    } 
    public static function unique_multidim_array($array, $key) { 
        $temp_array = array(); 
        $i = 0; 
        $key_array = array(); 
        
        foreach($array as $val) { 
            if (!in_array($val[$key], $key_array)) { 
                $key_array[$i] = $val[$key]; 
                $temp_array[$i] = $val; 
            } 
            $i++; 
        } 
        return $temp_array; 
    } 
 

    public function getOcupations(){
    	$ocupations_ = DB::table('tbl_new_occupation')->orderBy('id_occupation', 'DESC')->where('is_active', 1)->get();
    	$ocupations = array();
    	if(isset($ocupations_) && !empty($ocupations_)){
    		foreach ($ocupations_ as $ocupation) {
    			if(isset($ocupation->occupation) && !empty($ocupation->occupation) && isset($ocupation->id_occupation) && !empty($ocupation->id_occupation)){
    				$ocupations[strtolower($ocupation->occupation)] = $ocupation->id_occupation;
    			}
    		}
    	}
    	return $ocupations;
    }


}
